@extends('admin.report.layout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-10">
        <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-3">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center shadow-sm">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            Tambah Laporan
        </h1>
        <p class="text-gray-600 mt-2">Lengkapi formulir di bawah untuk menambahkan laporan baru</p>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 shadow-sm mb-8 animate-fade-in">
            <div class="flex items-center mb-3">
                <div class="w-7 h-7 bg-red-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-red-800 font-semibold">Terdapat kesalahan dalam pengisian form:</h3>
            </div>
            <ul class="list-disc pl-10 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-red-700 text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.report.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden">
        @csrf

        <!-- Form Header -->
        <div class="bg-gradient-to-r from-purple-50 to-indigo-50 px-8 py-6 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                Informasi Laporan
            </h2>
        </div>

        <div class="p-8">
            <!-- Basic Information Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Repair Order No -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        Repair Order No
                    </label>
                    <input type="text" name="repair_order_no" value="{{ old('repair_order_no') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Masukkan nomor repair order">
                </div>

                <!-- Customer -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Customer
                    </label>
                    <input type="text" name="customer" value="{{ old('customer') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Nama customer">
                </div>

                <!-- Unit Model -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Unit Model
                    </label>
                    <input type="text" name="unit_model" value="{{ old('unit_model') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Model unit">
                </div>

                <!-- Quantity -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        Quantity
                    </label>
                    <input type="number" name="qty" value="{{ old('qty') }}" min="1"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Jumlah">
                </div>

                <!-- Location -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Location
                    </label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Lokasi">
                </div>

                <!-- Document No -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Document No
                    </label>
                    <input type="text" name="document_no" value="{{ old('document_no') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Nomor dokumen">
                </div>

                <!-- Document Date -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Document Date
                    </label>
                    <input type="date" name="document_date" value="{{ old('document_date') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300">
                </div>

                <!-- Brand -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Brand
                    </label>
                    <input type="text" name="brand" value="{{ old('brand') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Brand/merk">
                </div>

                <!-- Engine -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Engine
                    </label>
                    <input type="text" name="engine" value="{{ old('engine') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Tipe engine">
                </div>

                <!-- Part No Unit -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                        Part No Unit
                    </label>
                    <input type="text" name="part_no_unit" value="{{ old('part_no_unit') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Nomor part unit">
                </div>

                <!-- Serial No Unit -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                        </svg>
                        Serial No Unit
                    </label>
                    <input type="text" name="serial_no_unit" value="{{ old('serial_no_unit') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Serial number unit">
                </div>

                <!-- Warranty -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Warranty
                    </label>
                    <input type="text" name="warranty" value="{{ old('warranty') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300"
                        placeholder="Informasi warranty">
                </div>
            </div>

            <!-- Upload Section -->
            <div class="border-t border-gray-200 pt-8 mb-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Upload Gambar -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Gambar
                        </label>
                        <div class="relative">
                            <input type="file" name="gambar" accept="image/*"
                                class="w-full border-2 border-dashed border-gray-200 rounded-xl px-4 py-6 text-center transition-all duration-200 hover:border-purple-300 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            Comment
                        </label>
                        <textarea name="comment" rows="4"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300 resize-none"
                            placeholder="Tambahkan komentar atau catatan...">{{ old('comment') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Dynamic Sections -->
            <div class="border-t border-gray-200 pt-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        Additional Sections
                    </h3>
                    <button type="button" id="add-section"
                        class="flex items-center px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Section
                    </button>
                </div>

                <div id="sections-wrapper" class="space-y-4">
                    <!-- Dynamic sections will be added here -->
                </div>
            </div>

            <!-- Submit Button -->
            <div class="border-t border-gray-200 pt-8 mt-8">
                <div class="flex justify-end">
                    <button type="submit"
                        class="flex items-center px-6 py-3 rounded-lg bg-purple-600 text-white text-sm font-medium hover:bg-purple-700 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Laporan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Enhanced Script for Dynamic Sections --}}
<script>
    let sectionIndex = 1;
    const addSectionBtn = document.getElementById('add-section');
    const sectionsWrapper = document.getElementById('sections-wrapper');

    addSectionBtn.addEventListener('click', function() {
        const newSection = document.createElement('div');
        newSection.classList.add('section-item', 'bg-white', 'border', 'border-gray-200', 'rounded-2xl', 'p-6', 'shadow-sm', 'hover:shadow-md', 'transition', 'transform', 'hover:-translate-y-1', 'animate-fade-in', 'relative');

        newSection.innerHTML = `
            <div class="absolute top-4 right-4">
                <button type="button" onclick="removeSection(this)"
                    class="flex items-center px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-sm font-medium border border-red-200 hover:bg-red-100 transition">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Hapus
                </button>
            </div>

            <div class="mb-4">
                <h4 class="text-lg font-semibold text-gray-900 flex items-center mb-4">
                    <div class="w-7 h-7 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    Section ${sectionIndex}
                </h4>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Gambar
                    </label>
                    <input type="file" name="sections[${sectionIndex}][gambar]" accept="image/*"
                        class="w-full border-2 border-dashed border-gray-200 rounded-xl px-4 py-4 transition-all duration-200 hover:border-purple-300 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                        Comment
                    </label>
                    <textarea name="sections[${sectionIndex}][comment]" rows="4"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 transition-all duration-200 focus:border-purple-500 focus:ring-4 focus:ring-purple-100 hover:border-gray-300 resize-none"
                        placeholder="Komentar untuk section ini..."></textarea>
                </div>
            </div>
        `;

        sectionsWrapper.appendChild(newSection);
        sectionIndex++;

        // Add fade-in animation
        setTimeout(() => {
            newSection.style.opacity = '1';
        }, 10);
    });

    // Function to remove section
    function removeSection(button) {
        const section = button.closest('.section-item');

        // Add fade-out animation
        section.style.opacity = '0';
        section.style.transform = 'translateY(-10px)';

        setTimeout(() => {
            section.remove();
            updateSectionNumbers();
        }, 300);
    }

    // Function to update section numbers after removal
    function updateSectionNumbers() {
        const sections = sectionsWrapper.querySelectorAll('.section-item');
        sections.forEach((section, index) => {
            const header = section.querySelector('h4');
            if (header) {
                header.innerHTML = `
                    <div class="w-7 h-7 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    Section ${index + 1}
                `;
            }
        });
    }

    // Form validation and submission
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = [
            'repair_order_no',
            'customer',
            'unit_model',
            'qty',
            'location'
        ];

        let isValid = true;
        const errors = [];

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (!field.value.trim()) {
                isValid = false;
                errors.push(fieldName.replace('_', ' ').toUpperCase());
                field.classList.add('border-red-500', 'ring-red-100');
                field.classList.remove('border-gray-200');
            } else {
                field.classList.remove('border-red-500', 'ring-red-100');
                field.classList.add('border-gray-200');
            }
        });

        if (!isValid) {
            e.preventDefault();
            showValidationMessage('Please fill in all required fields: ' + errors.join(', '));
            // Scroll to first error field
            const firstErrorField = document.querySelector('.border-red-500');
            if (firstErrorField) {
                firstErrorField.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    });

    // Function to show validation messages
    function showValidationMessage(message) {
        // Remove existing message if any
        const existingMessage = document.querySelector('.validation-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        const messageDiv = document.createElement('div');
        messageDiv.className = 'validation-message bg-red-50 border border-red-200 rounded-2xl p-4 shadow-sm mb-6 animate-fade-in';
        messageDiv.innerHTML = `
            <div class="flex items-center">
                <div class="w-6 h-6 bg-red-100 rounded-full flex items-center justify-center mr-3">
                    <svg class="w-3 h-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <span class="text-red-700 text-sm font-medium">${message}</span>
            </div>
        `;

        const form = document.querySelector('form');
        form.parentNode.insertBefore(messageDiv, form);

        // Auto-remove message after 5 seconds
        setTimeout(() => {
            if (messageDiv.parentNode) {
                messageDiv.remove();
            }
        }, 5000);
    }

    // File upload preview functionality
    document.addEventListener('change', function(e) {
        if (e.target.type === 'file' && e.target.accept === 'image/*') {
            handleImagePreview(e.target);
        }
    });

    function handleImagePreview(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];

            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                input.value = '';
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Please select a valid image file');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                // Create or update preview
                let preview = input.parentNode.querySelector('.image-preview');
                if (!preview) {
                    preview = document.createElement('div');
                    preview.className = 'image-preview mt-3';
                    input.parentNode.appendChild(preview);
                }

                preview.innerHTML = `
                    <div class="relative inline-block">
                        <img src="${e.target.result}" alt="Preview"
                             class="w-24 h-24 object-cover rounded-lg border-2 border-gray-200 shadow-sm">
                        <button type="button" onclick="removePreview(this)"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full text-xs hover:bg-red-600 transition">
                            ×
                        </button>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }
    }

    function removePreview(button) {
        const preview = button.closest('.image-preview');
        const fileInput = preview.parentNode.querySelector('input[type="file"]');

        preview.remove();
        fileInput.value = '';
    }

    // Auto-resize textarea
    document.addEventListener('input', function(e) {
        if (e.target.tagName === 'TEXTAREA') {
            e.target.style.height = 'auto';
            e.target.style.height = (e.target.scrollHeight) + 'px';
        }
    });

    // Smooth transitions for form elements
    document.querySelectorAll('input, textarea, select').forEach(element => {
        element.addEventListener('focus', function() {
            this.parentNode.classList.add('transform', 'scale-105');
        });

        element.addEventListener('blur', function() {
            this.parentNode.classList.remove('transform', 'scale-105');
        });
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + Enter to submit form
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            document.querySelector('form').submit();
        }

        // Ctrl/Cmd + Shift + N to add new section
        if ((e.ctrlKey || e.metaKey) && e.shiftKey && e.key === 'N') {
            e.preventDefault();
            addSectionBtn.click();
        }
    });

    // Progress indicator
    function updateProgress() {
        const allInputs = document.querySelectorAll('input[required], textarea[required], select[required]');
        const filledInputs = Array.from(allInputs).filter(input => input.value.trim() !== '');
        const progress = (filledInputs.length / allInputs.length) * 100;

        let progressBar = document.querySelector('.progress-bar');
        if (!progressBar && allInputs.length > 0) {
            progressBar = document.createElement('div');
            progressBar.className = 'progress-bar fixed top-0 left-0 w-full h-1 bg-purple-600 transition-all duration-300 z-50';
            progressBar.style.width = '0%';
            document.body.appendChild(progressBar);
        }

        if (progressBar) {
            progressBar.style.width = progress + '%';

            if (progress === 100) {
                progressBar.style.backgroundColor = '#10b981'; // green-500
            }
        }
    }

    // Update progress on input change
    document.addEventListener('input', updateProgress);
    document.addEventListener('change', updateProgress);

    // Initialize progress on page load
    document.addEventListener('DOMContentLoaded', updateProgress);
</script>

{{-- Custom CSS for animations --}}
<style>
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-item {
        transition: all 0.3s ease;
    }

    .section-item:hover {
        transform: translateY(-2px);
    }

    input:focus, textarea:focus, select:focus {
        box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.1);
    }

    .progress-bar {
        transition: width 0.3s ease;
    }
</style>

@endsection
