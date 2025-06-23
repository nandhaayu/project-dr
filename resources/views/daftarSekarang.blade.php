<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">Formulir Pendaftaran Santri Baru</h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form id="formPendaftaran" action="{{ route('pendaftars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded shadow">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" class="w-full mt-1 p-2 border rounded" value="{{ old('nama') }}" required>
                </div>

                <!-- NIK -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" class="w-full mt-1 p-2 border rounded" value="{{ old('nik') }}" required>
                </div>

                <!-- Tempat dan Tanggal Lahir -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="w-full mt-1 p-2 border rounded" value="{{ old('tempat_lahir') }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full mt-1 p-2 border rounded" value="{{ old('tanggal_lahir') }}" required>
                    </div>
                </div>

                <!-- No HP -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">No HP</label>
                    <p class="italic text-sm text-gray-500 mb-1">*Masukkan nomor telepon dimulai dengan 62 (kode negara Indonesia, Contoh: 6281234567890)</p>
                    <input type="text" name="no_hp" class="w-full mt-1 p-2 border rounded" value="{{ old('no_hp') }}" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Nama Orangtua -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Orangtua</label>
                    <input type="text" name="nama_orangtua" class="w-full mt-1 p-2 border rounded" value="{{ old('nama_orangtua') }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kurikulum</label>
                    <select name="kurikulum" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">-- Pilih --</option>
                        <option value="Tahfidz" {{ old('kurikulum') == 'Tahfidz' ? 'selected' : '' }}>Tahfidz</option>
                        <option value="Kitab Kuning" {{ old('kurikulum') == 'Kitab Kuning' ? 'selected' : '' }}>Kitab Kuning</option>
                    </select>
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <textarea name="alamat" class="w-full mt-1 p-2 border rounded" rows="3" required>{{ old('alamat') }}</textarea>
                </div>

                <!-- Harapan -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Alasan Masuk Pondok</label>
                    <textarea name="harapan" class="w-full mt-1 p-2 border rounded" rows="3">{{ old('harapan') }}</textarea>
                </div>

                <!-- Upload Akte -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Upload Akte Kelahiran (PDF)</label>
                    <input type="file" name="akte" accept="application/pdf" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <!-- Upload KK -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Upload Kartu Keluarga (PDF)</label>
                    <input type="file" name="kk" accept="application/pdf" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-green-600 text-white py-2 px-6 rounded hover:bg-teal-700 transition">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
            if (!confirm('Periksa Data Anda Sebelum Kirim Pendaftaran?')) {
                e.preventDefault();
            }
        });
    </script>
</x-layout>
