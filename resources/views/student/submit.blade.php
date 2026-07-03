<x-app-layout>
    @section('top-bar-left')
        <h2 class="text-[16px] font-extrabold text-[#1E293B] tracking-tight">Submit Achievement</h2>
    @endsection

    <div class="max-w-[1000px] mx-auto text-left">
        <!-- Section Header -->
        <div class="mb-6">
            <h2 class="text-xl font-extrabold text-[#1E293B] tracking-tight">New Submission</h2>
            <p class="text-[13px] text-[#64748B]">Provide achievement details and upload supporting documents for faculty verification.</p>
        </div>

        <!-- 2-Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 submit-layout">
            <!-- Left: Form Card (Col Span 7) -->
            <div class="lg:col-span-7 card-elevated p-6 md:p-8">
                <form action="{{ route('student.history') }}" method="GET" class="flex flex-col">
                    <!-- Achievement Title -->
                    <div class="form-group">
                        <label for="title">Achievement Title *</label>
                        <input type="text" id="title" required placeholder="e.g. AWS Certified Solutions Architect">
                    </div>

                    <!-- Domain & Category (Two-col) -->
                    <div class="two-col">
                        <div class="form-group">
                            <label for="domain">Achievement Domain *</label>
                            <select id="domain" name="domain" required>
                                <option value="" disabled selected>Select Domain</option>
                                <option value="Academic">📚 Academic</option>
                                <option value="Extra-Curricular">🎨 Extra-Curricular</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Category *</label>
                            <select id="category" name="category" required disabled>
                                <option value="" disabled selected>Select Category</option>
                            </select>
                        </div>
                    </div>

                    <!-- Date & Issuing Organisation (Two-col) -->
                    <div class="two-col">
                        <div class="form-group">
                            <label for="date">Date of Achievement *</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="issuer">Issuing Organisation</label>
                            <input type="text" id="issuer" name="issuer" placeholder="e.g. Amazon Web Services (AWS)">
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea id="description" required rows="4" placeholder="Briefly describe what you did, skills learned, or achievements made..."></textarea>
                    </div>

                    <!-- File Dropzone -->
                    <div class="form-group">
                        <label>Upload Proof Document *</label>
                        <div class="upload-zone" onclick="document.getElementById('file-input').click()">
                            <input type="file" id="file-input" class="hidden" required>
                            
                            <!-- Cloud Upload icon -->
                            <svg class="w-10 h-10 text-[#94A3B8] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <span class="text-sm font-bold text-[#1E293B] mb-1">Drag & drop your file here</span>
                            <span class="text-xs text-[#64748B] mb-3">Supports PDF, JPG, PNG — max 5 MB</span>
                            <button type="button" class="btn btn-ghost btn-sm rounded-lg">Browse Files</button>
                        </div>
                    </div>

                    <div class="h-px bg-[#E2E8F0] my-6"></div>

                    <!-- Action buttons -->
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-ghost btn-sm rounded-lg">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm rounded-lg flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span>Submit Achievement</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right: Instructions & Timelines (Col Span 5) -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                <!-- Illustration Panel -->
                <div class="border border-[#E2E8F0] bg-gradient-to-br from-[#EFF6FF] via-[#EFF6FF] to-[#FAF5FF] rounded-[24px] p-6 shadow-sm flex flex-col items-center text-center justify-center min-h-[300px] submit-illo">
                    <!-- Circular Icon Chip -->
                    <div class="w-16 h-16 rounded-full border border-blue-200 bg-white flex items-center justify-center shadow-sm mb-4 shrink-0">
                        <svg class="w-7 h-7 text-[#2563EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <h3 class="text-base font-extrabold text-[#1E293B] mb-2">Share Your Story</h3>
                    <p class="text-[13px] text-[#64748B] mb-6 max-w-[280px]">Follow these recommendations to ensure quick and successful verification.</p>
                    
                    <!-- Tips Checklist -->
                    <div class="w-full text-left divide-y divide-[#E2E8F0] border-t border-b border-[#E2E8F0]">
                        <div class="py-3 flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#22C55E] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-[12px] text-[#64748B] font-medium">Upload clear and readable proof documents</span>
                        </div>
                        <div class="py-3 flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#22C55E] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-[12px] text-[#64748B] font-medium">Select the most accurate categories</span>
                        </div>
                        <div class="py-3 flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#22C55E] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-[12px] text-[#64748B] font-medium">Add a meaningful description</span>
                        </div>
                        <div class="py-3 flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-[#22C55E] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-[12px] text-[#64748B] font-medium">PDF formats are highly preferred</span>
                        </div>
                    </div>
                </div>

                <!-- Callout timeline box -->
                <div class="border border-[#EFF6FF] bg-[#EFF6FF] rounded-2xl p-4 flex gap-3 text-left">
                    <span class="text-xl">📋</span>
                    <div>
                        <h4 class="text-xs font-extrabold text-[#1E293B] mb-1">Review Timeline</h4>
                        <p class="text-[12px] text-[#64748B] leading-relaxed">
                            Faculty advisors typically evaluate submitted proofs within <strong class="text-[#1E293B]">2–3 working days</strong>. You will receive email notifications.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to handle dynamic file selection display -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // File input upload styling toggle
            const fileInput = document.getElementById('file-input');
            if (fileInput) {
                fileInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const dropzone = this.closest('.upload-zone');
                        if (dropzone) {
                            const titleSpan = dropzone.querySelector('span.text-sm');
                            const descSpan = dropzone.querySelector('span.text-xs');
                            const button = dropzone.querySelector('button');
                            const svg = dropzone.querySelector('svg');

                            if (titleSpan) {
                                titleSpan.textContent = "Selected: " + file.name;
                            }
                            if (descSpan) {
                                descSpan.textContent = (file.size / (1024 * 1024)).toFixed(2) + " MB";
                            }
                            if (button) {
                                button.textContent = "Change File";
                            }
                            if (svg) {
                                svg.classList.remove('text-[#94A3B8]');
                                svg.classList.add('text-[#22C55E]');
                            }
                        }
                    }
                });
            }

            // Dynamic Category dropdown populating based on selected Domain
            const domainSelect = document.getElementById('domain');
            const categorySelect = document.getElementById('category');

            const categories = {
                'Academic': [
                    { value: 'Internship', label: '🏢 Internship' },
                    { value: 'Hackathon', label: '💻 Hackathon' },
                    { value: 'Project', label: '🚀 Project' },
                    { value: 'Research Paper', label: '📄 Research Paper' },
                    { value: 'Seminar', label: '🎤 Seminar' },
                    { value: 'Workshop', label: '🛠️ Workshop' },
                    { value: 'Certification', label: '📜 Certification' },
                    { value: 'Technical Competition', label: '🏆 Technical Competition' },
                    { value: 'Patent', label: '💡 Patent' },
                    { value: 'Publication', label: '📰 Publication' },
                    { value: 'Training Program', label: '🎓 Training Program' }
                ],
                'Extra-Curricular': [
                    { value: 'Sports', label: '⚽ Sports' },
                    { value: 'Dance', label: '💃 Dance' },
                    { value: 'Music', label: '🎵 Music' },
                    { value: 'Drama', label: '🎭 Drama' },
                    { value: 'Cultural Event', label: '🎪 Cultural Event' },
                    { value: 'Art', label: '🎨 Art' },
                    { value: 'Photography', label: '📷 Photography' },
                    { value: 'Debate', label: '🗣️ Debate' },
                    { value: 'Quiz', label: '❓ Quiz' },
                    { value: 'NSS', label: '🌿 NSS' },
                    { value: 'NCC', label: '🎖️ NCC' },
                    { value: 'Volunteer Work', label: '🤝 Volunteer Work' },
                    { value: 'Social Service', label: '🌍 Social Service' },
                    { value: 'Other', label: '✨ Other' }
                ]
            };

            if (domainSelect && categorySelect) {
                domainSelect.addEventListener('change', function () {
                    const selectedDomain = this.value;
                    
                    // Clear previous options except placeholder
                    categorySelect.innerHTML = '<option value="" disabled selected>Select Category</option>';
                    
                    if (categories[selectedDomain]) {
                        categories[selectedDomain].forEach(function (cat) {
                            const option = document.createElement('option');
                            option.value = cat.value;
                            option.textContent = cat.label;
                            categorySelect.appendChild(option);
                        });
                        categorySelect.disabled = false;
                    } else {
                        categorySelect.disabled = true;
                    }
                });
            }
        });
    </script>
</x-app-layout>
