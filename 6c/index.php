<?php
  include 'koneksi.php';

  $result = mysqli_query($koneksi, "SELECT *,product.`id` AS id_product,cashier.`name` AS cashier,category.`name` AS category,product.`name` AS product,product.price FROM product INNER JOIN cashier ON cashier.id = product.id_cashier INNER JOIN category ON category.id = product.id_category");
  $cashier = mysqli_query($koneksi, "SELECT * FROM cashier");
  $category = mysqli_query($koneksi, "SELECT * FROM category");

  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
   
  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <title>Home</title>
  <style>
    nav {
      box-shadow: 0 0px 24px -8px rgba(0, 0, 0, 0.3);
    }

    .navbar .from-group {
      position: relative !important;
      margin: 0 auto;
    }

    .search {
      width: 800px;
      font-size: 24px;
      margin: 0px auto;
      color: white;
    }

    .table {
      box-shadow: 0 0px 24px -8px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light">
    <a class="navbar-brand"><img src="assets/img/logo.png" alt="Home" width="40%"></a>
    <div class="form-group">
      <input class="form-control mr-sm-2 search" type="search" placeholder="Search" style="margin-top: 15px;background-color: #cecece;">
    </div>
    <div class="from-group">
      <button class="btn btn-lg" type="button" style="background-color: #fadc9c; color: white; width: 120px;" data-toggle="modal" data-target="#add">ADD</button>
    </div>
  </nav>

  <div class="container mt-5">
    <table class="table rounded-lg" style="border:1px;">
      <tr style="background-color: #fadc9c; color: white;">
        <th scope="col">No</th>
        <th scope="col">Cashier</th>
        <th scope="col">Product</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
      <?php $no = 1;
       foreach($result as $key) {
      ?>
        <tr>
          <th scope="row"><?=$no;?></th>
          <td><?=$key['cashier'];?></td>
          <td><?=$key['product'];?></td>
          <td><?=$key['category'];?></td>
          <td><?=rupiah($key['price'])?></td>
          <td>
            <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit" data-id="<?=$key['id_product'];?>" data-cashier="<?=$key['id_cashier'];?>" data-product="<?=$key['product'];?>" data-category="<?=$key['id_category'];?>" data-price="<?=$key['price'];?>">Edit</button>
            
            <button type="submit" class="btn btn-sm" data-toggle="modal" data-target="#delete" data-id="<?=$key['id_product'];?>" data-product="<?=$key['product'];?>" ><svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect width="40" height="40" fill="url(#pattern0)"/>
            <defs>
            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0" transform="scale(0.015625)"/>
            </pattern>
            <image id="image0" width="64" height="64" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABg1BMVEUAAADiWlPjWlPiWlPiWlLiWlPkWlL/gIDiWlPiWlP/AADhWlTjW1LiWE7iWlPhWlPfWVP/VVXhW1XiWlPiWlPmWVniWVLiWlPMZmbiWlPiWVTjWlPhWVPjWlPhWVPjWVTjWlPhW1ThWlrjWVPhWlXiWlPiWlThWVTiWlPfYFDjWlXjWlTiWlPiWlPiWlPgWFPiWVPiWlPiWlPiWVPhWlPiWlPiWlPfWFDiWlLkV1HhWVPiWlPiWlPiWVPhW1ThWVPiWlPiWlPkXlHjXlXhWlPiWlPiW1TiWlPiWlLkWlXiWlPiWlPiWlPiWlPiV1DhWlLhWlThWVXiWlPiWlLhWlPiWVPjXFTjWVHiW1TVVVXiWlPhWlPiWVTjWlPlXFXiWlPiWlP/QEDiXFLhWlThWlPiWlPjWlThW1PiWlLjWVThW1LkWVXiWlTiWlPbSUnhW1PjWVPjVVXjWlPgWFLiW1LhW1LiWVTiWlTrYk7jWlPhW1LiWVTfYGDiW1LjWlPiWlMAAACRqe/bAAAAf3RSTlMAR7Ps67BBApaOAYB2GvesKAMqsvQUassF0WGReIiaZGySES4zr4OJqBA2vf38uDFZ+vhQ2MzZIJ4mK92T5ENN2/sTG/LmRtyhMOH5/vYjXVU8xMBmv0BItwacIq6qJ7uXBE53b59bo3yrVDlYaQdfXAlKS5h5j08NkHCxCJXXCx2JUQAAAAFiS0dEAIgFHUgAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfkAREKADS455sdAAABzUlEQVRYw+2XWVMTQRSFh4gG2cMuixATCaKG1YAsQoSASlAwcRc1LAZkUcAtEP3+uu1Eq+jQCXferHLOy9w6PeernjszVX0ty6gSzzk0lZ6/YMnlLcOgi+ViQAVGVUrzVdVQU+s9afnq6qGhUQhogmZfvtlyCVqFgDZoNz5XhxBwGTpPu13gL567EgjmdBW6g6cUgp4/ZeCaId57/QZi3Qz35ef7B+Tx3xoc0vO1gwo7fEuoiNpsw4gGGIXh28IeK42Nw4TmTMIded6ypmBaM6Jw1wlgBmY1IwZzTgBDMK8Z95QxJs/ffwBlmlO3APF56VtQLWTxoc58FHX2HSws5e9q+bGDeDzRa3iwBCSDAqm/KmzszBN4KungM3j+7wNevAy/sovG1yu5f//N23cpB4DVv9/JGqzbxQaUOAC8h7RddMOmXWzBBxfgAlyAC3ABLuD/BWxDhV20wo5dhIj3OQBYq7t79tX78VNu1NrvOrCcAIqpIMADhxLAEqwYFz7DFwlANfarcWEHIqmz83vqmPvNuPJdTbuZM/PlaiSL7ZvXjtQZ9Hg7WyyeXQ6rm5KF4Fuyg266ID+VEUxu0ZDPKqzAj0h1sfTiT3/eWPELJXQcmAP8mRYAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjAtMDEtMTdUMTA6MDA6NTIrMDA6MDDjUSunAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIwLTAxLTE3VDEwOjAwOjUyKzAwOjAwkgyTGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII="/>
            </defs>
            </svg>
            </button>
        </td>
        </tr>
      <?php $no++; } ?>
    </table>
  </div>

  <!-- Modal Add -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">ADD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="add.php" method="POST">
            <div class="form-group">
              <select id="cashier" name="cashier" class="form-control" required>
                <?php foreach ($cashier as $key) { ?>
                  <option value="<?=$key['id'];?>"><?=$key['name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select id="category" name="category" class="form-control" required>
                <?php foreach ($category as $key) { ?>
                  <option value="<?=$key['id'];?>"><?=$key['name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="product" name="product" placeholder="ice tea" required>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="price" name="price" placeholder="Rp10.0000" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn" style="background-color: #fadc9c; color: white;">ADD</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">EDIT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="edit.php" method="POST">
            <input type="text" id="edit_id" name="edit_id" hidden>
            <div class="form-group">
              <select id="edit_cashier" name="edit_cashier" class="form-control">
                <?php foreach ($cashier as $key) { ?>
                  <option value="<?=$key['id'];?>"><?=$key['name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <select id="edit_category" name="edit_category" class="form-control">
                <?php foreach ($category as $key) { ?>
                  <option value="<?=$key['id'];?>"><?=$key['name'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="edit_product" name="edit_product" placeholder="ice tea">
            </div>
            <div class="form-group">
              <input type="number" class="form-control" id="edit_price" name="edit_price" placeholder="Rp10.0000">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">EDIT</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal Hapus -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">DELETE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="delete.php" method="POST">
            <input type="text" id="delete_id" name="delete_id" hidden>
            Apakah Anda Yakin Ingin Menghapus <b id="delete_product"></b> Ini?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/sweetalert/dist/sweetalert2.all.min.js"></script>

  <script>
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var cashier = button.data('cashier')
      var product = button.data('product')
      var category = button.data('category')
      var price = button.data('price')
      var modal = $(this)
      modal.find('#edit_id').val(id)
      modal.find('#edit_cashier').val(cashier)
      modal.find('#edit_product').val(product)
      modal.find('#edit_category').val(category)
      modal.find('#edit_price').val(price)
    })

    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var product = button.data('product')
      var modal = $(this)
      modal.find('#delete_id').val(id)
      modal.find('#delete_product').html(product)
    })

    <?php if(isset($_GET['status']) == "added"){ ?>
      Swal.fire(
      'Berhasil Ditambahkan!',
      '',
      'success'
    )
    <?php } ?>
    <?php if(isset($_GET['status']) == "edited"){ ?>
      Swal.fire(
      'Berhasil Diedit!',
      '',
      'success'
    )
    <?php } ?>
    <?php if(isset($_GET['status']) == "deleted"){ ?>
      Swal.fire(
      'Berhasil Dihapus!',
      '',
      'success'
    )
    <?php } ?>
  </script>
</body>

</html>