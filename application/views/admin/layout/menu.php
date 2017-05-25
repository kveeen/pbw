<nav>
    <ul id="MenuBar1" class="MenuBarHorizontal">
        <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>        </li>
                <li><a href="<?php echo base_url(); ?>admin/produk" class="MenuBarItemSubmenu">Produk Kinari</a>
          <ul>
            <li><a href="<?php echo base_url(); ?>admin/produk">Data Produk</a></li>
            <li><a href="<?php echo base_url(); ?>admin/produk/tambah">Tambah produk</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url(); ?>Register">Tambah akun</a></li>
  </nav>
  <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script> 