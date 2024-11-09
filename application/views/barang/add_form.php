<main>
    <div class="container-fluid"><br>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('barang'); ?>">Barang</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
            <form action="<?php echo site_url('barang/save'); ?>" method="post">
            <div class="mb-3">
                <label> Barkode <code>*</code></label>
                <input class="form-control" type="text" name="barkode" placeholder="Barkode" required />
            </div>
            <div class="mb-3">
                <label> Nama Barang <code>*</code></label>
                <input class="form-control" type="text" name="name" placeholder="Nama Barang" required />
            </div>
            <div class="mb-3">
                <label> Harga Beli <code>*</code></label>
                <input class="form-control" type="text" name="harga_beli" placeholder="Harga Beli" required />
            </div>
            <div class="mb-3">
                <label> Harga Jual <code>*</code></label>
                <input class="form-control" type="text" name="harga_jual" placeholder="Harga Jual" required />
            </div>
            <div class="mb-3">
                <label> Kategori <code>*</code></label>
                <select class="form-control" name="kategori"  required >
                <option value="">-Pilih-</option>
                <?php foreach($kategori as $k):?>
                <option value="<?php echo $k['id']?>"><?php echo $k['name']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label> Satuan <code>*</code></label>
                <select class="form-control" name="satuan"  required >
                <option value="">-Pilih-</option>
                <?php foreach($satuan as $k):?>
                <option value="<?php echo $k['id']?>"><?php echo $k['name']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label> Supplier <code>*</code></label>
                <select class="form-control" name="supplier"  required >
                <option value="">-Pilih-</option>
                <?php foreach($supplier as $k):?>
                <option value="<?php echo $k['id']?>"><?php echo $k['name']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label> Stok <code>*</code></label>
                <input class="form-control" type="text" name="stok" placeholder="Stok" required />
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Save</button>
        </form>
