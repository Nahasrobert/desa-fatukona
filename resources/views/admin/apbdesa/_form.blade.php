@php
    // $item hanya ada pada edit; pada create gunakan old()
@endphp

<div class="mb-3">
    <label class="form-label">Tahun <span class="text-danger">*</span></label>
    <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
        value="{{ old('tahun', $item->tahun ?? '') }}" min="2000" step="1">
    @error('tahun')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Bidang <span class="text-danger">*</span></label>
    <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror"
        value="{{ old('bidang', $item->bidang ?? '') }}" maxlength="100"
        placeholder="Contoh: Penyelenggaraan Pemerintahan Desa">
    @error('bidang')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Anggaran (Rp) <span class="text-danger">*</span></label>
            <input type="number" name="anggaran" class="form-control @error('anggaran') is-invalid @enderror"
                value="{{ old('anggaran', $item->anggaran ?? 0) }}" min="0" step="0.01">
            @error('anggaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Realisasi (Rp) <span class="text-danger">*</span></label>
            <input type="number" name="realisasi" class="form-control @error('realisasi') is-invalid @enderror"
                value="{{ old('realisasi', $item->realisasi ?? 0) }}" min="0" step="0.01">
            @error('realisasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">
        <i data-feather="save"></i> Simpan
    </button>
    <a href="{{ url('admin/apbdesa') }}" class="btn btn-secondary">Kembali</a>
</div>
