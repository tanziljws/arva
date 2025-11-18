@extends('layouts.admin')

@section('title', 'Tambah Foto')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0">
                <i class="fas fa-plus-circle me-2"></i>Tambah Foto Baru
            </h1>
            <p class="text-muted">Upload foto baru ke galeri sekolah</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <h6><i class="fas fa-exclamation-triangle me-2"></i>Terjadi Kesalahan:</h6>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading me-2"></i>Judul Foto
                            </label>
                            <input type="text" name="title" id="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title') }}" 
                                   placeholder="Masukkan judul foto" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">
                                <i class="fas fa-tags me-2"></i>Kategori
                            </label>
                            <div class="position-relative">
                                <div class="input-group">
                                    <input type="text" name="category" id="category" 
                                           class="form-control @error('category') is-invalid @enderror" 
                                           value="{{ old('category') }}" 
                                           placeholder="Pilih atau ketik kategori..."
                                           autocomplete="off">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" 
                                            id="categoryDropdownBtn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" id="categoryDropdownMenu">
                                        <li><h6 class="dropdown-header"><i class="fas fa-list me-2"></i>Pilih Kategori</h6></li>
                                        <li><a class="dropdown-item" href="#" data-category="Acara Sekolah">
                                            <i class="fas fa-calendar-alt me-2"></i>Acara Sekolah</a></li>
                                        <li><a class="dropdown-item" href="#" data-category="Kegiatan">
                                            <i class="fas fa-running me-2"></i>Kegiatan</a></li>
                                        <li><a class="dropdown-item" href="#" data-category="Prestasi">
                                            <i class="fas fa-trophy me-2"></i>Prestasi</a></li>
                                        <li><a class="dropdown-item" href="#" data-category="Fasilitas">
                                            <i class="fas fa-building me-2"></i>Fasilitas</a></li>
                                        <li><a class="dropdown-item" href="#" data-category="Ekstrakulikuler">
                                            <i class="fas fa-users me-2"></i>Ekstrakulikuler</a></li>
                                        <li><a class="dropdown-item" href="#" data-category="Lainnya">
                                            <i class="fas fa-ellipsis-h me-2"></i>Lainnya</a></li>
                                    </ul>
                                </div>
                                <div id="searchSuggestions" class="dropdown-menu w-100" style="display: none; max-height: 200px; overflow-y: auto;">
                                    <!-- Search suggestions akan muncul di sini -->
                                </div>
                            </div>
                            <div class="form-text">
                                <i class="fas fa-lightbulb me-1"></i>
                                Pilih dari dropdown atau ketik untuk mencari/membuat kategori baru
                            </div>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>Deskripsi
                            </label>
                            <textarea name="description" id="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="4" 
                                      placeholder="Masukkan deskripsi foto (opsional)">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">
                                <i class="fas fa-image me-2"></i>Upload Gambar
                            </label>
                            <input type="file" name="image" id="image" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   accept="image/*" required>
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 10MB.
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-2"></i>Simpan Foto
                            </button>
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryInput = document.getElementById('category');
    const searchSuggestions = document.getElementById('searchSuggestions');
    const categoryDropdownMenu = document.getElementById('categoryDropdownMenu');
    
    // Predefined categories + categories from database
    const predefinedCategories = [
        'Acara Sekolah',
        'Kegiatan',
        'Prestasi',
        'Fasilitas',
        'Ekstrakulikuler',
        'Olahraga',
        'Seni',
        'Akademik',
        'Upacara',
        'Wisuda',
        'Lomba',
        'Festival',
        'Kelas',
        'Laboratorium',
        'Perpustakaan',
        'Kantin',
        'Taman',
        'Gedung'
    ];
    
    // Get existing categories from database via AJAX
    let existingCategories = [];
    
    fetch('/admin/gallery/categories')
        .then(response => response.json())
        .then(data => {
            existingCategories = data;
        })
        .catch(error => {
            console.log('Could not fetch existing categories');
        });
    
    // Handle dropdown item clicks
    categoryDropdownMenu.addEventListener('click', function(e) {
        if (e.target.classList.contains('dropdown-item') && e.target.dataset.category) {
            e.preventDefault();
            categoryInput.value = e.target.dataset.category;
            // Close dropdown
            const dropdown = bootstrap.Dropdown.getInstance(document.getElementById('categoryDropdownBtn'));
            if (dropdown) dropdown.hide();
        }
    });
    
    // Show search suggestions when typing
    function showSearchSuggestions(query) {
        if (query.length === 0) {
            searchSuggestions.style.display = 'none';
            return;
        }
        
        const allCategories = [...new Set([...predefinedCategories, ...existingCategories])];
        const filtered = allCategories.filter(cat => 
            cat.toLowerCase().includes(query.toLowerCase()) && 
            cat.toLowerCase() !== query.toLowerCase()
        );
        
        if (filtered.length > 0) {
            searchSuggestions.innerHTML = '';
            
            // Add header
            const header = document.createElement('li');
            header.innerHTML = '<h6 class="dropdown-header"><i class="fas fa-search me-2"></i>Hasil Pencarian</h6>';
            searchSuggestions.appendChild(header);
            
            filtered.slice(0, 8).forEach(category => {
                const item = document.createElement('li');
                item.innerHTML = `<a class="dropdown-item" href="#" data-search-category="${category}">
                    <i class="fas fa-tag me-2"></i>${category}
                </a>`;
                searchSuggestions.appendChild(item);
            });
            
            // Add divider and "create new" option if exact match not found
            if (!allCategories.some(cat => cat.toLowerCase() === query.toLowerCase())) {
                const divider = document.createElement('li');
                divider.innerHTML = '<hr class="dropdown-divider">';
                searchSuggestions.appendChild(divider);
                
                const createNew = document.createElement('li');
                createNew.innerHTML = `<a class="dropdown-item text-success" href="#" data-search-category="${query}">
                    <i class="fas fa-plus me-2"></i>Buat kategori baru: "<strong>${query}</strong>"
                </a>`;
                searchSuggestions.appendChild(createNew);
            }
            
            searchSuggestions.style.display = 'block';
        } else {
            // Show "create new" option
            searchSuggestions.innerHTML = `
                <li><h6 class="dropdown-header"><i class="fas fa-plus me-2"></i>Kategori Baru</h6></li>
                <li><a class="dropdown-item text-success" href="#" data-search-category="${query}">
                    <i class="fas fa-plus me-2"></i>Buat kategori: "<strong>${query}</strong>"
                </a></li>
            `;
            searchSuggestions.style.display = 'block';
        }
    }
    
    // Handle search suggestion clicks
    searchSuggestions.addEventListener('click', function(e) {
        if (e.target.closest('[data-search-category]')) {
            e.preventDefault();
            const category = e.target.closest('[data-search-category]').dataset.searchCategory;
            categoryInput.value = category;
            searchSuggestions.style.display = 'none';
        }
    });
    
    // Input event for search
    categoryInput.addEventListener('input', function() {
        const query = this.value.trim();
        showSearchSuggestions(query);
    });
    
    categoryInput.addEventListener('focus', function() {
        if (this.value.length > 0) {
            showSearchSuggestions(this.value);
        }
    });
    
    // Hide search suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!categoryInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
            searchSuggestions.style.display = 'none';
        }
    });
    
    // Handle keyboard navigation for search suggestions
    categoryInput.addEventListener('keydown', function(e) {
        const items = searchSuggestions.querySelectorAll('.dropdown-item');
        let activeItem = searchSuggestions.querySelector('.dropdown-item.active');
        
        if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (!activeItem && items.length > 0) {
                items[0].classList.add('active');
            } else if (activeItem) {
                activeItem.classList.remove('active');
                const nextItem = activeItem.parentElement.nextElementSibling?.querySelector('.dropdown-item') || items[0];
                nextItem.classList.add('active');
            }
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (!activeItem && items.length > 0) {
                items[items.length - 1].classList.add('active');
            } else if (activeItem) {
                activeItem.classList.remove('active');
                const prevItem = activeItem.parentElement.previousElementSibling?.querySelector('.dropdown-item') || items[items.length - 1];
                prevItem.classList.add('active');
            }
        } else if (e.key === 'Enter') {
            e.preventDefault();
            if (activeItem) {
                activeItem.click();
            }
        } else if (e.key === 'Escape') {
            searchSuggestions.style.display = 'none';
        }
    });
});
</script>

<style>
.dropdown-item:hover,
.dropdown-item.active {
    background-color: var(--admin-primary, #6366f1);
    color: white;
}

.dropdown-item {
    cursor: pointer;
    padding: 0.5rem 1rem;
    transition: all 0.2s ease;
}

#categoryDropdown {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    background: white;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}
</style>
@endsection
