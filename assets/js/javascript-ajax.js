// Load Partial Page
// ------------------------------------------------------------------------- //

function load(nama) {
  $("#partialPage").html('<div class="text-center">Please Wait...</div>');
  $.ajax({
    url: nama + ".php",
    type: "GET",
    dataType: "html",
    success: function (isi) {
      $("#partialPage").html(isi);
    },
  });

  var header = document.getElementById("nav-bar");
  var btns = header.getElementsByClassName("nav-item");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function () {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
}

// User: Reload Atribut User
// ------------------------------------------------------------------------- //

function reload_atribut_user() {
  $("#getBalance").html("Reload...");
  $.ajax({
    url: "proses/transaksi/reload_atribut_user.php",
    type: "POST",
    data: {},
    success: function (data) {
      var json = $.parseJSON(data);
      $("#getNama").html(json.get_nama);
      $("#getEmail").html(json.get_email);
      $("#getBalance").html(json.get_balance);
      $("#getLevel").html(json.get_level);
    },
  });
}

// User: Pembelian Pulsa
// ------------------------------------------------------------------------- //

function pembelian_pulsa() {
  var nohp = $("#nohp").val();
  var providers = $("#providers").val();
  var nominal = $("#nominal").val();

  $.ajax({
    url: "proses/transaksi/pembelian-pulsa.php",
    type: "POST",
    data: {
      nohp: nohp,
      providers: providers,
      nominal: nominal,
    },
    success: function (data) {
      $("#result").html(data);
      reload_atribut_user();
    },
  });
}

// User: Topup Balance
// ------------------------------------------------------------------------- //

function topup_balance() {
  var metode = $("#metode").val();
  var nominal = $("#nominal").val();

  $.ajax({
    url: "proses/transaksi/topup-balance.php",
    type: "POST",
    data: {
      metode: metode,
      nominal: nominal,
    },
    success: function (data) {
      $("#result").html(data);
    },
  });
}

// Admin: Manajemen User
// ------------------------------------------------------------------------- //

function user_read(nama, email, level, balance, status) {
  document.getElementById("user_nama").value = nama;
  document.getElementById("user_email").value = email;
  document.getElementById("user_level").value = level;
  document.getElementById("user_balance").value = balance;
  document.getElementById("user_status").value = status;
}

function user_update() {
  var user_nama = $("#user_nama").val();
  var user_level = $("#user_level").val();
  var user_email = $("#user_email").val();
  var user_balance = $("#user_balance").val();
  var user_status = $("#user_status").val();

  $.ajax({
    url: "proses/admin/user.php",
    type: "POST",
    data: {
      kode: "update",
      user_nama: user_nama,
      user_level: user_level,
      user_email: user_email,
      user_balance: user_balance,
      user_status: user_status,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      swal({
        icon: json.status,
        text: json.message,
        confirmButtonText: "OK",
      });
      load("pages/admin/user");
      reload_atribut_user();
    },
  });
}

function user_delete(id) {
  if (confirm("Yakin ingin menghapus user?")) {
    $.ajax({
      url: "proses/admin/user.php",
      type: "POST",
      data: {
        kode: "delete",
        id: id,
      },
      success: function (data) {
        load("pages/admin/user");
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
      },
    });
  } else {
  }
}

// Admin: Manajemen Pembelian
// ------------------------------------------------------------------------- //

function pembelian_read(id_pembelian, email, deskripsi, harga, status) {
  document.getElementById("pembelian_id").value = id_pembelian;
  document.getElementById("pembelian_email").value = email;
  document.getElementById("pembelian_deskripsi").innerHTML = deskripsi;
  document.getElementById("pembelian_harga").value = harga;
  document.getElementById("pembelian_status").value = status;
}

function pembelian_update() {
  var pembelian_id = $("#pembelian_id").val();
  var pembelian_status = $("#pembelian_status").val();

  $.ajax({
    url: "proses/admin/pembelian.php",
    type: "POST",
    data: {
      kode: "update",
      pembelian_id: pembelian_id,
      pembelian_status: pembelian_status,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      swal({
        icon: json.status,
        text: json.message,
        confirmButtonText: "OK",
      });
      load("pages/admin/pembelian");
    },
  });
}

function pembelian_delete(id) {
  if (confirm("Yakin ingin menghapus data pembelian?")) {
    $.ajax({
      url: "proses/admin/pembelian.php",
      type: "POST",
      data: {
        kode: "delete",
        id: id,
      },
      success: function (data) {
        load("pages/admin/pembelian");
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
      },
    });
  } else {
  }
}

// Admin: Manajemen Topup Balance
// ------------------------------------------------------------------------- //

function topup_read(id_topup, email, deskripsi, nominal, status) {
  document.getElementById("topup_id").value = id_topup;
  document.getElementById("topup_email").value = email;
  document.getElementById("topup_deskripsi").innerHTML = deskripsi;
  document.getElementById("topup_nominal").value = nominal;
  document.getElementById("topup_status").value = status;
}

function topup_update() {
  var topup_id = $("#topup_id").val();
  var topup_status = $("#topup_status").val();

  $.ajax({
    url: "proses/admin/topup_update.php",
    type: "POST",
    data: {
      topup_id: topup_id,
      topup_status: topup_status,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      swal({
        icon: json.status,
        text: json.message,
        confirmButtonText: "OK",
      });
      load("pages/admin/topup");
      reload_atribut_user();
    },
  });
}

function topup_delete(id) {
  if (confirm("Yakin ingin menghapus data topup?")) {
    $.ajax({
      url: "proses/admin/topup_delete.php",
      type: "POST",
      data: {
        id: id,
      },
      success: function (data) {
        load("pages/admin/topup");
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
      },
    });
  } else {
  }
}

// Admin: Provider
// ------------------------------------------------------------------------- //

function provider_create() {
  var provider_nama = $("#provider_nama_new").val();

  if (provider_nama == "") {
    swal({
      icon: "error",
      text: "Nama provider tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/provider.php",
      type: "POST",
      data: {
        kode: "create",
        provider_nama: provider_nama,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  }
}

function provider_update(id) {
  var provider_nama = $("#provider_nama_" + id).val();

  if (provider_nama == "") {
    swal({
      icon: "error",
      text: "Nama provider tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/provider.php",
      type: "POST",
      data: {
        kode: "update",
        id: id,
        provider_nama: provider_nama,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  }
}

function provider_delete(id) {
  if (confirm("Yakin ingin menghapus provider?")) {
    $.ajax({
      url: "proses/admin/provider.php",
      type: "POST",
      data: {
        kode: "delete",
        id: id,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  } else {
  }
}

// Admin: Nominal
// ------------------------------------------------------------------------- //

function nominal_create() {
  var nominal = $("#nominal_new").val();
  var harga = $("#harga_new").val();

  if (nominal == "" || harga == "") {
    swal({
      icon: "error",
      text: "Nominal dan harga tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/nominal.php",
      type: "POST",
      data: {
        kode: "create",
        nominal: nominal,
        harga: harga,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  }
}

function nominal_update(id) {
  var nominal = $("#nominal_" + id).val();
  var harga = $("#harga_" + id).val();

  if (nominal == "" || harga == "") {
    swal({
      icon: "error",
      text: "Nominal dan harga tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/nominal.php",
      type: "POST",
      data: {
        kode: "update",
        id: id,
        nominal: nominal,
        harga: harga,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  }
}

function nominal_delete(id) {
  if (confirm("Yakin ingin menghapus nominal?")) {
    $.ajax({
      url: "proses/admin/nominal.php",
      type: "POST",
      data: {
        kode: "delete",
        id: id,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/provider_nominal");
      },
    });
  } else {
  }
}

// Admin: Metode topup
// ------------------------------------------------------------------------- //

function metode_create() {
  var nama = $("#metode_nama_new").val();
  var jenis = $("#metode_jenis_new").val();
  var rekening = $("#metode_rekening_new").val();

  if (nama == "" || jenis == "" || rekening == "") {
    swal({
      icon: "error",
      text: "Nama, jenis, dan rekening tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/metode_topup.php",
      type: "POST",
      data: {
        kode: "create",
        nama: nama,
        jenis: jenis,
        rekening: rekening,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/metode_topup");
      },
    });
  }
}

function metode_update(id) {
  var nama = $("#metode_nama_" + id).val();
  var jenis = $("#metode_jenis_" + id).val();
  var rekening = $("#metode_rekening_" + id).val();

  if (nama == "" || jenis == "" || rekening == "") {
    swal({
      icon: "error",
      text: "Nama, jenis, dan rekening tidak boleh kosong",
      confirmButtonText: "OK",
    });
  } else {
    $.ajax({
      url: "proses/admin/metode_topup.php",
      type: "POST",
      data: {
        kode: "update",
        id: id,
        nama: nama,
        jenis: jenis,
        rekening: rekening,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/metode_topup");
      },
    });
  }
}

function metode_delete(id) {
  if (confirm("Yakin ingin menghapus metode topup?")) {
    $.ajax({
      url: "proses/admin/metode_topup.php",
      type: "POST",
      data: {
        kode: "delete",
        id: id,
      },
      success: function (data) {
        var json = $.parseJSON(data);
        swal({
          icon: json.status,
          text: json.message,
          confirmButtonText: "OK",
        });
        load("pages/admin/metode_topup");
      },
    });
  } else {
  }
}
