<x-layout>
    <section class="py-12 bg-gray-100">
        <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-xl font-bold text-gray-800 mb-6">Data Pendaftaran</h2>

            <ul class="space-y-2">
                <li><strong>Nama:</strong> {{ $pendaftar->nama }}</li>
                <li><strong>NIK:</strong> {{ $pendaftar->nik }}</li>
                <li><strong>Tempat/Tanggal Lahir:</strong> {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</li>
                <li><strong>No HP:</strong> {{ $pendaftar->no_hp }}</li>
                <li><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</li>
                <li><strong>Nama Orangtua:</strong> {{ $pendaftar->nama_orangtua }}</li>
                <li><strong>Kurikulum:</strong> {{ $pendaftar->kurikulum }}</li>
                <li><strong>Alamat:</strong> {{ $pendaftar->alamat }}</li>
                <li><strong>Harapan:</strong> {{ $pendaftar->harapan }}</li>
            </ul>

            <div class="mt-6">
                <h3 class="font-semibold text-gray-700 mb-2">File Terlampir</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ asset('storage/' . $pendaftar->akte) }}" target="_blank" class="text-blue-600 hover:underline">
                            📄 Lihat Akte Kelahiran
                        </a>
                    </li>
                    <li>
                        <a href="{{ asset('storage/' . $pendaftar->kk) }}" target="_blank" class="text-blue-600 hover:underline">
                            📄 Lihat Kartu Keluarga
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</x-layout>
