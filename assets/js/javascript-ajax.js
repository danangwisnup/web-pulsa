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

function reload_balance() {
  $("#getBalance").html("Reload...");
  $.ajax({
    url: "proses/transaksi/reload_balance.php",
    type: "POST",
    data: {},
    success: function (data) {
      $("#getBalance").html(data);
    },
  });
}

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
      reload_balance();
    },
  });
}

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

function user_read(id) {
  $.ajax({
    url: "proses/admin/user_read.php",
    type: "POST",
    data: {
      id: id,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      document.getElementById("user_nama").value = json.nama;
      document.getElementById("user_level").value = json.level;
      document.getElementById("user_email").value = json.email;
      document.getElementById("user_balance").value = json.balance;
      document.getElementById("user_status").value = json.status;
    },
  });
}

function user_update() {
  var user_nama = $("#user_nama").val();
  var user_level = $("#user_level").val();
  var user_email = $("#user_email").val();
  var user_balance = $("#user_balance").val();
  var user_status = $("#user_status").val();

  $.ajax({
    url: "proses/admin/user_update.php",
    type: "POST",
    data: {
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
      reload_balance();
    },
  });
}

function user_delete(id) {
  if (confirm("Yakin ingin menghapus user?")) {
    $.ajax({
      url: "proses/admin/user_delete.php",
      type: "POST",
      data: {
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

function pembelian_read(id) {
  $.ajax({
    url: "proses/admin/pembelian_read.php",
    type: "POST",
    data: {
      id: id,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      document.getElementById("pembelian_id").value = json.id_pembelian;
      document.getElementById("pembelian_email").value = json.email;
      document.getElementById("pembelian_deskripsi").value = json.deskripsi;
      document.getElementById("pembelian_harga").value = json.harga;
      document.getElementById("pembelian_status").value = json.status;
    },
  });
}

function pembelian_update() {
  var pembelian_id = $("#pembelian_id").val();
  var pembelian_status = $("#pembelian_status").val();

  $.ajax({
    url: "proses/admin/pembelian_update.php",
    type: "POST",
    data: {
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
      url: "proses/admin/pembelian_delete.php",
      type: "POST",
      data: {
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

function topup_read(id) {
  $.ajax({
    url: "proses/admin/topup_read.php",
    type: "POST",
    data: {
      id: id,
    },
    success: function (data) {
      var json = $.parseJSON(data);
      document.getElementById("topup_id").value = json.id_topup;
      document.getElementById("topup_email").value = json.email;
      document.getElementById("topup_deskripsi").innerHTML = json.deskripsi;
      document.getElementById("topup_nominal").value = json.nominal;
      document.getElementById("topup_status").value = json.status;
    },
  });
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
