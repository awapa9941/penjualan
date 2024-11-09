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
                <input class="form-control" type="hidden" name="id" value="<?=$barang->id;?>" required />
                <input class="form-control" type="text" name="Barkode" value="<?=$barang->barkode;?>" placeholder="Barkode" required />
            </div>
            <div class="mb-3">
                <label> Nama Barang <code>*</code></label>
                <input class="form-control" type="text" value="<?=$barang->name;?>" name="name" placeholder="Nama Barang" required />
            </div>
            <div class="mb-3">
                <label> Harga Beli <code>*</code></label>
                <input class="form-control" type="text" value="<?=$barang->harga_beli;?>" name="harga_beli" placeholder="Harga Beli" required />
            </div>
            <div class="mb-3">
                <label> Harga Jual <code>*</code></label>
                <input class="form-control" type="text" value="<?=$barang->harga_jual;?>" name="harga_jual" placeholder="Harga Jual" required />
            </div>    
            <div class="mb-3">
                <label> Stok <code>*</code></label>
                <input class="form-control" type="text" value="<?=$barang->stok;?>" name="stok" placeholder="Stok" required />
            </div>
            
            <div class="mb-3">
                <label> Kategori <code>*</code></label>
                <select class="form-control" name="kategori"  required >
                <?php foreach($kategori as $kategori):?>
                <?php if($barang->kategori_id == $kategori['id']):?>
                <option value="<?php echo $kategori['id']?>"selected><?php echo $kategori['name']?></option>
                <?php else: ?>
                <option value="<?php echo $kategori['id']?>"><?php echo $kategori['name']?></option>
                <?php endif; ?>
                <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label> Satuan <code>*</code></label>
                <?php foreach($satuan as $satuan):?>
                <?php if($barang->satuan_id == $satuan['id']):?>
                <option value="<?php echo $satuan['id']?>"selected><?php echo $satuan['name']?></option>
                <?php else: ?>
                <option value="<?php echo $satuan['id']?>"><?php echo $satuan['name']?></option>
                <?php endif; ?>
                <?php endforeach;?>
                </select>
            </div>
            <div class="mb-3">
                <label> Supplier <code>*</code></label>
                <?php foreach($supplier as $supplier):?>
                <?php if($barang->supplier_id == $supplier['id']):?>
                <option value="<?php echo $supplier['id']?>"selected><?php echo $supplier['name']?></option>
                <?php else: ?>
                <option value="<?php echo $supplier['id']?>"><?php echo $supplier['name']?></option>
                <?php endif; ?>
                <?php endforeach;?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning"><i class="fas fa-plus"></i> Update</button>
        </form>
            </div>
        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>