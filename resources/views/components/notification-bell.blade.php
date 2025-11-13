<div class="relative" x-data="notificationBell()">
    <!-- Notification Bell -->
    <button @click="toggleDropdown" class="relative p-2 text-gray-300 hover:text-orange transition-colors">
        <i class="fas fa-bell text-xl"></i>
        <span x-show="unreadCount > 0" 
              x-text="unreadCount > 99 ? '99+' : unreadCount"
              class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
        </span>
    </button>

    <!-- Dropdown -->
    <div x-show="isOpen" 
         @click.away="isOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute right-0 mt-2 w-80 bg-gray-800 rounded-lg shadow-lg border border-gray-700 z-50"
         style="display: none;">
        
        <!-- Header -->
        <div class="px-4 py-3 border-b border-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-100">Notifications</h3>
                <div class="flex items-center space-x-2">
                    <button @click="markAllAsRead" 
                            x-show="unreadCount > 0"
                            class="text-orange hover:text-orange-300 text-sm">
                        Mark all read
                    </button>
                    <a href="{{ route('notifications.index') }}" 
                       class="text-orange hover:text-orange-300 text-sm">
                        View all
                    </a>
                </div>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="max-h-96 overflow-y-auto">
            <template x-for="notification in notifications" :key="notification.id">
                <div class="px-4 py-3 border-b border-gray-700 hover:bg-gray-700 transition-colors cursor-pointer"
                     :class="{ 'bg-gray-700': !notification.read_at }"
                     @click="markAsRead(notification.id)">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                 :class="getNotificationIconClass(notification.type)">
                                <i :class="getNotificationIcon(notification.type)" class="text-sm"></i>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-100" x-text="notification.data.title"></p>
                            <p class="text-sm text-gray-400 mt-1" x-text="notification.data.message"></p>
                            <p class="text-xs text-gray-500 mt-1" x-text="formatDate(notification.created_at)"></p>
                        </div>
                        <div x-show="!notification.read_at" class="flex-shrink-0">
                            <div class="w-2 h-2 bg-orange rounded-full"></div>
                        </div>
                    </div>
                </div>
            </template>
            
            <!-- Empty State -->
            <div x-show="notifications.length === 0" class="px-4 py-8 text-center">
                <i class="fas fa-bell-slash text-gray-500 text-2xl mb-2"></i>
                <p class="text-gray-400">No notifications yet</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-4 py-3 border-t border-gray-700">
            <a href="{{ route('notifications.index') }}" 
               class="block text-center text-orange hover:text-orange-300 text-sm">
                View all notifications
            </a>
        </div>
    </div>
</div>

<script>
function notificationBell() {
    return {
        isOpen: false,
        notifications: [],
        unreadCount: 0,
        
        init() {
            this.loadNotifications();
            // Refresh notifications every 30 seconds
            setInterval(() => {
                this.loadNotifications();
            }, 30000);
        },
        
        async loadNotifications() {
            try {
                const response = await fetch('/notifications/recent?limit=5');
                const data = await response.json();
                this.notifications = data.notifications;
                this.unreadCount = data.unread_count;
            } catch (error) {
                console.error('Failed to load notifications:', error);
            }
        },
        
        toggleDropdown() {
            this.isOpen = !this.isOpen;
            if (this.isOpen) {
                this.loadNotifications();
            }
        },
        
        async markAsRead(notificationId) {
            try {
                const response = await fetch(`/notifications/${notificationId}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                });
                const data = await response.json();
                if (data.success) {
                    this.unreadCount = data.unread_count;
                    // Update the notification in the list
                    const notification = this.notifications.find(n => n.id === notificationId);
                    if (notification) {
                        notification.read_at = new Date().toISOString();
                    }
                }
            } catch (error) {
                console.error('Failed to mark notification as read:', error);
            }
        },
        
        async markAllAsRead() {
            try {
                const response = await fetch('/notifications/mark-all-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                });
                const data = await response.json();
                if (data.success) {
                    this.unreadCount = 0;
                    this.notifications.forEach(notification => {
                        notification.read_at = new Date().toISOString();
                    });
                }
            } catch (error) {
                console.error('Failed to mark all notifications as read:', error);
            }
        },
        
        getNotificationIcon(type) {
            const icons = {
                'booking_created': 'fas fa-calendar-plus',
                'booking_received': 'fas fa-calendar-check',
                'payment_success': 'fas fa-check-circle',
                'payment_received': 'fas fa-money-bill-wave',
                'billboard_verified': 'fas fa-check-circle',
                'billboard_unverified': 'fas fa-times-circle',
                'transfer_completed': 'fas fa-check-double',
                'transfer_failed': 'fas fa-exclamation-triangle',
                'booking_cancelled': 'fas fa-calendar-times',
                'booking_completed': 'fas fa-calendar-check'
            };
            return icons[type] || 'fas fa-bell';
        },
        
        getNotificationIconClass(type) {
            const classes = {
                'booking_created': 'bg-blue-600',
                'booking_received': 'bg-green-600',
                'payment_success': 'bg-green-600',
                'payment_received': 'bg-orange',
                'billboard_verified': 'bg-green-600',
                'billboard_unverified': 'bg-yellow-600',
                'transfer_completed': 'bg-green-600',
                'transfer_failed': 'bg-red-600',
                'booking_cancelled': 'bg-red-600',
                'booking_completed': 'bg-blue-600'
            };
            return classes[type] || 'bg-gray-600';
        },
        
        formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);
            
            if (diffInSeconds < 60) {
                return 'Just now';
            } else if (diffInSeconds < 3600) {
                const minutes = Math.floor(diffInSeconds / 60);
                return `${minutes}m ago`;
            } else if (diffInSeconds < 86400) {
                const hours = Math.floor(diffInSeconds / 3600);
                return `${hours}h ago`;
            } else {
                const days = Math.floor(diffInSeconds / 86400);
                return `${days}d ago`;
            }
        }
    }
}
</script>
