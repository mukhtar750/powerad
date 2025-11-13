<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up · POWERAD INTERNATIONAL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-[#363366] via-[#2E2A5F] to-[#1F1B4B] text-white">
    <div class="relative min-h-screen">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-[#F58634]/8 via-transparent to-transparent"></div>

        <div class="relative z-10 container mx-auto px-6 py-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left copy -->
                <div class="hidden lg:block">
                    <div class="inline-flex items-center bg-white/5 text-white/80 text-xs px-3 py-1 rounded-full mb-6 border border-white/10">
                        <span class="w-2 h-2 bg-orange-500 rounded-full mr-2"></span>
                        Join 10,000+ happy users
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight">
                        Power your <span class="text-[#F58634]">digital future</span>
                    </h1>
                    <p class="text-white/70 max-w-xl mb-8">Create your account to access a modern marketplace built for OOH creators and advertisers.</p>
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-[#F58634]/30 border border-[#F58634]/50"></div>
                        <div class="w-8 h-8 rounded-full bg-[#F58634]/30 border border-[#F58634]/50"></div>
                        <div class="w-8 h-8 rounded-full bg-[#F58634]/30 border border-[#F58634]/50"></div>
                        <div class="w-8 h-8 rounded-full bg-[#F58634]/30 border border-[#F58634]/50"></div>
                    </div>
                </div>

                <!-- Right card -->
                <div class="w-full max-w-md mx-auto lg:max-w-lg">
                    <div class="flex flex-col items-center mb-6">
                        <img src="{{ asset('images/primarylogo.png') }}" alt="PowerAD Logo" class="h-12 w-auto">
                        <p class="text-xs text-white/50 mt-2">Powering Innovation</p>
                    </div>

                    <div class="bg-white/5 backdrop-blur rounded-2xl p-6 border border-white/10 shadow-xl">
                        <!-- Tabs -->
                        <div class="flex items-center bg-white/10 rounded-lg p-1 text-sm mb-6">
                            <a href="{{ route('login') }}" class="flex-1 text-center py-2 rounded-md text-white/80 hover:bg-white/10">Sign in</a>
                            <a href="{{ route('register') }}" class="flex-1 text-center py-2 rounded-md bg-[#F58634] hover:bg-[#e9772a] text-white font-semibold transition-colors">Sign up</a>
                        </div>

                        <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                @if($errors->any())
                    <div class="text-sm text-red-400 bg-red-500/10 border border-red-500/30 rounded p-3">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="mb-4">
                    <label for="name" class="block text-gray-300 text-sm font-futura mb-2">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="John Doe" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-300 text-sm font-futura mb-2">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="you@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-300 text-sm font-futura mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="********" required>
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-300 text-sm font-futura mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#F58634]" placeholder="********" required>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select id="role" name="role" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white/90 focus:outline-none" required>
                        <option value="">Select your role</option>
                        <option value="loap">LOAP</option>
                        <option value="advertiser">Advertiser</option>
                        <option value="regulator">Regulator</option>
                        <option value="service_provider">Service Provider</option>
                    </select>
                </div>

                <!-- Regulator specific fields -->
                <div id="regulator-fields" class="mb-4 hidden">
                    <label for="regulator_type_select" class="block text-gray-700 text-sm font-bold mb-2">Regulator Type</label>
                    <select id="regulator_type_select" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white/90 focus:outline-none">
                        <option value="">Select type</option>
                        <option value="arcon">Federal (ARCON)</option>
                        <option value="state">State Regulator</option>
                    </select>

                    <div id="state-details" class="mt-4 hidden">
                        <label for="state_select" class="block text-gray-700 text-sm font-bold mb-2">State</label>
                        <select id="state_select" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white/90 focus:outline-none">
                            <option value="">Select state</option>
                            <option value="Abia">Abia</option>
                            <option value="Adamawa">Adamawa</option>
                            <option value="Akwa Ibom">Akwa Ibom</option>
                            <option value="Anambra">Anambra</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Bayelsa">Bayelsa</option>
                            <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                            <option value="Cross River">Cross River</option>
                            <option value="Delta">Delta</option>
                            <option value="Ebonyi">Ebonyi</option>
                            <option value="Edo">Edo</option>
                            <option value="Ekiti">Ekiti</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Imo">Imo</option>
                            <option value="Jigawa">Jigawa</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kebbi">Kebbi</option>
                            <option value="Kogi">Kogi</option>
                            <option value="Kwara">Kwara</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Nasarawa">Nasarawa</option>
                            <option value="Niger">Niger</option>
                            <option value="Ogun">Ogun</option>
                            <option value="Ondo">Ondo</option>
                            <option value="Osun">Osun</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Plateau">Plateau</option>
                            <option value="Rivers">Rivers</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Taraba">Taraba</option>
                            <option value="Yobe">Yobe</option>
                            <option value="Zamfara">Zamfara</option>
                            <option value="FCT">FCT (Abuja)</option>
                        </select>

                        <label for="agency_select" class="block text-gray-700 text-sm font-bold mb-2 mt-4">Agency</label>
                        <select id="agency_select" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white/90 focus:outline-none">
                            <option value="">Select agency</option>
                            <!-- Options will be populated dynamically based on state -->
                        </select>

                        <div id="agency_other_wrap" class="mt-4 hidden">
                            <label for="agency_other_input" class="block text-gray-700 text-sm font-bold mb-2">Enter Agency Name</label>
                            <input type="text" id="agency_other_input" class="w-full px-4 py-3 bg-[#111827] border border-white/10 rounded-lg text-white placeholder-white/40 focus:outline-none" placeholder="Type agency name">
                            <p class="text-xs text-gray-400 mt-2">For example: LASAA (Lagos), DOAS (FCT), ANSAA (Anambra).</p>
                        </div>
                    </div>

                    <!-- Hidden fields bound to selection -->
                    <input type="hidden" id="regulator_type" name="regulator_type" />
                    <input type="hidden" id="regulator_agency" name="regulator_agency" />
                    <input type="hidden" id="state" name="state" />
                </div>

                <button type="submit" class="w-full py-3 bg-[#F58634] hover:bg-[#e9772a] text-white font-semibold rounded-lg transition-colors">Create your account</button>
            </form>
            <p class="text-center text-white/70 text-sm mt-6">Already have an account? <a href="{{ route('login') }}" class="text-[#F58634] hover:text-[#ff9a50]">Sign in</a></p>
        </div>
    </div>
    <script>
        (function() {
            const roleSelect = document.getElementById('role');
            const regulatorFields = document.getElementById('regulator-fields');
            const typeSelect = document.getElementById('regulator_type_select');
            const stateDetails = document.getElementById('state-details');
            const stateSelect = document.getElementById('state_select');
            const agencySelect = document.getElementById('agency_select');
            const agencyOtherWrap = document.getElementById('agency_other_wrap');
            const agencyOtherInput = document.getElementById('agency_other_input');
            const typeInput = document.getElementById('regulator_type');
            const agencyInput = document.getElementById('regulator_agency');
            const stateInput = document.getElementById('state');

            const REGULATORS = @json(config('state_regulators', []));

            function populateAgenciesForState(state) {
                // Clear existing options
                while (agencySelect.firstChild) {
                    agencySelect.removeChild(agencySelect.firstChild);
                }
                const placeholder = document.createElement('option');
                placeholder.value = '';
                placeholder.textContent = 'Select agency';
                agencySelect.appendChild(placeholder);

                const agencies = REGULATORS[state] || [];
                agencies.forEach(a => {
                    const opt = document.createElement('option');
                    const label = a.acronym ? `${a.name} (${a.acronym})` : a.name;
                    opt.value = label;
                    opt.textContent = label;
                    agencySelect.appendChild(opt);
                });
                const otherOpt = document.createElement('option');
                otherOpt.value = '__other__';
                otherOpt.textContent = 'Other / Not listed';
                agencySelect.appendChild(otherOpt);

                // Reset selection and hidden inputs
                agencySelect.value = '';
                agencyInput.value = '';
                agencyOtherWrap.classList.add('hidden');
                agencyOtherInput.value = '';
            }

            function updateRegulatorVisibility() {
                if (roleSelect.value === 'regulator') {
                    regulatorFields.classList.remove('hidden');
                } else {
                    regulatorFields.classList.add('hidden');
                    // Clear values when not regulator
                    typeSelect.value = '';
                    stateSelect.value = '';
                    typeInput.value = '';
                    agencyInput.value = '';
                    stateInput.value = '';
                    stateDetails.classList.add('hidden');
                    // Reset agency selector and "Other" input
                    if (agencySelect) agencySelect.value = '';
                    if (agencyOtherWrap) agencyOtherWrap.classList.add('hidden');
                    if (agencyOtherInput) agencyOtherInput.value = '';
                }
            }

            function bindTypeSelection() {
                const val = typeSelect.value;
                if (val === 'arcon') {
                    typeInput.value = 'arcon';
                    agencyInput.value = 'ARCON';
                    stateInput.value = '';
                    stateDetails.classList.add('hidden');
                } else if (val === 'state') {
                    typeInput.value = 'state';
                    agencyInput.value = '';
                    stateDetails.classList.remove('hidden');
                    // Re-populate agency list for the current state
                    populateAgenciesForState(stateSelect.value || '');
                } else {
                    typeInput.value = '';
                    agencyInput.value = '';
                    stateInput.value = '';
                    stateDetails.classList.add('hidden');
                }
            }

            function bindStateSelection() {
                stateInput.value = stateSelect.value || '';
                if (typeSelect.value === 'state') {
                    populateAgenciesForState(stateSelect.value || '');
                }
            }

            function bindAgencySelection() {
                const val = agencySelect.value;
                if (val === '__other__') {
                    agencyOtherWrap.classList.remove('hidden');
                    agencyInput.value = agencyOtherInput.value || '';
                } else {
                    agencyOtherWrap.classList.add('hidden');
                    agencyInput.value = val || '';
                }
            }

            function bindAgencyOtherInput() {
                if (!agencyOtherWrap.classList.contains('hidden')) {
                    agencyInput.value = agencyOtherInput.value || '';
                }
            }

            roleSelect.addEventListener('change', updateRegulatorVisibility);
            typeSelect.addEventListener('change', bindTypeSelection);
            stateSelect.addEventListener('change', bindStateSelection);
            agencySelect.addEventListener('change', bindAgencySelection);
            agencyOtherInput.addEventListener('input', bindAgencyOtherInput);
            // Initialize state
            updateRegulatorVisibility();
            bindTypeSelection();
            bindStateSelection();
            bindAgencySelection();
        })();
    </script>
</body>
</html>