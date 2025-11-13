<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Unsafe Billboard - Citizen Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .text-orange {
            color: #ff6b35;
        }
        .bg-orange {
            background-color: #ff6b35;
        }
        .border-orange {
            border-color: #ff6b35;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD International Logo" class="h-8 w-auto">
                    <span class="ml-3 text-xl font-semibold text-gray-900">Citizen Report Portal</span>
                </div>
                <div class="text-sm text-gray-500">
                    Report unsafe or illegal billboards
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Report Unsafe or Illegal Billboard</h1>
                <p class="text-gray-600 text-lg">Help keep our communities safe by reporting billboards that pose a risk to public safety or violate regulations.</p>
            </div>

            <form id="citizen-report-form" class="space-y-8">
                <!-- Personal Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-user text-orange mr-2"></i>Your Information
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" name="reporter_name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="reporter_email" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="reporter_phone" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Contact Method</label>
                            <select name="contact_method" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                                <option value="sms">SMS</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Report Details -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>Report Details
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Report Title *</label>
                            <input type="text" name="report_title" required placeholder="Brief description of the issue" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Issue Type *</label>
                            <select name="issue_type" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <option value="">Select issue type</option>
                                <option value="structural_damage">Structural Damage</option>
                                <option value="safety_hazard">Safety Hazard</option>
                                <option value="illegal_installation">Illegal Installation</option>
                                <option value="obstructing_traffic">Obstructing Traffic</option>
                                <option value="obstructing_signs">Obstructing Traffic Signs</option>
                                <option value="unauthorized_content">Unauthorized Content</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Priority Level *</label>
                            <select name="priority" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <option value="">Select priority</option>
                                <option value="low">Low - Minor issue</option>
                                <option value="medium">Medium - Moderate concern</option>
                                <option value="high">High - Serious safety concern</option>
                                <option value="urgent">Urgent - Immediate danger</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Detailed Description *</label>
                            <textarea name="description" required rows="4" placeholder="Please provide a detailed description of the issue, including what you observed and why you believe it's a problem..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Location Information
                    </h2>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Address or Location *</label>
                            <input type="text" name="location" required placeholder="Street address, landmark, or area description" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                                <input type="text" name="city" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">State *</label>
                                <select name="state" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                    <option value="">Select state</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Abuja">Abuja</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">GPS Coordinates (Optional)</label>
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="latitude" placeholder="Latitude" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <input type="text" name="longitude" placeholder="Longitude" class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            </div>
                            <p class="text-sm text-gray-500 mt-2">You can get GPS coordinates from your phone's maps app</p>
                        </div>
                    </div>
                </div>

                <!-- Photo Upload -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-camera text-green-500 mr-2"></i>Photo Evidence
                    </h2>
                    <div class="space-y-4">
                        <p class="text-gray-600">Please upload photos of the billboard issue. Multiple photos from different angles are helpful.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors">
                                <input type="file" name="photos[]" accept="image/*" class="hidden" id="photo1" onchange="previewImage(this, 'preview1')">
                                <label for="photo1" class="cursor-pointer">
                                    <i class="fas fa-camera text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-sm text-gray-600">Click to upload photo</p>
                                </label>
                                <img id="preview1" class="hidden mt-2 max-w-full h-32 object-cover rounded">
                            </div>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors">
                                <input type="file" name="photos[]" accept="image/*" class="hidden" id="photo2" onchange="previewImage(this, 'preview2')">
                                <label for="photo2" class="cursor-pointer">
                                    <i class="fas fa-camera text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-sm text-gray-600">Click to upload photo</p>
                                </label>
                                <img id="preview2" class="hidden mt-2 max-w-full h-32 object-cover rounded">
                            </div>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 transition-colors">
                                <input type="file" name="photos[]" accept="image/*" class="hidden" id="photo3" onchange="previewImage(this, 'preview3')">
                                <label for="photo3" class="cursor-pointer">
                                    <i class="fas fa-camera text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-sm text-gray-600">Click to upload photo</p>
                                </label>
                                <img id="preview3" class="hidden mt-2 max-w-full h-32 object-cover rounded">
                            </div>
                        </div>
                        <p class="text-sm text-gray-500">Maximum 5MB per photo. Supported formats: JPG, PNG, GIF</p>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>Additional Information
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">When did you first notice this issue?</label>
                            <input type="date" name="first_noticed" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Has this issue been reported before?</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="reported_before" value="no" class="mr-2">
                                    <span>No, this is the first time</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="reported_before" value="yes" class="mr-2">
                                    <span>Yes, I've reported this before</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="reported_before" value="unsure" class="mr-2">
                                    <span>I'm not sure</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Additional Comments</label>
                            <textarea name="additional_comments" rows="3" placeholder="Any additional information that might be helpful..." class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Privacy Notice -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">
                        <i class="fas fa-shield-alt mr-2"></i>Privacy Notice
                    </h3>
                    <p class="text-blue-800 text-sm">
                        Your personal information will be kept confidential and will only be used to contact you about this report if necessary. 
                        Photos and location information will be shared with the appropriate regulatory authorities for investigation purposes.
                    </p>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-orange text-white px-8 py-3 rounded-lg hover:bg-orange-600 transition-colors font-semibold text-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Report
                    </button>
                    <p class="text-sm text-gray-500 mt-4">
                        By submitting this report, you confirm that the information provided is accurate to the best of your knowledge.
                    </p>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-400">&copy; 2024 PowerAD International. All rights reserved.</p>
                <p class="text-gray-500 text-sm mt-2">Thank you for helping keep our communities safe.</p>
            </div>
        </div>
    </footer>

    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById(previewId);
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Form submission
        document.getElementById('citizen-report-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Submitting...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual API call)
            setTimeout(() => {
                alert('Report submitted successfully! Thank you for helping keep our community safe.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    </script>
</body>
</html>
