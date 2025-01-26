var currentTab = 0; // Indeks tab saat ini

function showTab(e) {
   var tabs = document.getElementsByClassName("wizard-form-tab");
   tabs[e].style.display = "block"; // Tampilkan tab saat ini

   // Tombol Previous
   document.getElementById("prevBtn").style.display = e === 0 ? "none" : "inline";

   // Tombol Next atau Submit
   var nextBtn = document.getElementById("nextBtn");
   if (e === tabs.length - 1) {
       nextBtn.innerHTML = "Submit";
       nextBtn.type = "submit"; // Tombol berubah menjadi submit
       nextBtn.removeAttribute("onclick"); // Hapus event onclick untuk submit manual
   } else {
       nextBtn.innerHTML = "Next";
       nextBtn.type = "button"; // Ubah kembali ke tombol biasa
       nextBtn.setAttribute("onclick", "nextPrev(1)");
   }

   fixStepIndicator(e); // Perbarui indikator langkah
}

function nextPrev(step) {
   var tabs = document.getElementsByClassName("wizard-form-tab");

   // Sembunyikan tab saat ini
   tabs[currentTab].style.display = "none";

   // Navigasi antar-tab
   currentTab += step;

   // Batasi navigasi agar tidak melebihi jumlah tab
   if (currentTab >= tabs.length) {
       currentTab = tabs.length - 1;
       return;
   }

   if (currentTab < 0) {
       currentTab = 0;
       return;
   }

   // Tampilkan tab baru
   showTab(currentTab);
}

function fixStepIndicator(e) {
   var steps = document.getElementsByClassName("list-item");
   for (var i = 0; i < steps.length; i++) {
       steps[i].className = steps[i].className.replace(" active", "");
   }
   steps[e].className += " active";
}

// Mencegah submit otomatis jika form belum di tab terakhir
document.getElementById("wizardForm").addEventListener("submit", function (e) {
   if (currentTab < document.getElementsByClassName("wizard-form-tab").length - 1) {
       e.preventDefault(); // Cegah pengiriman form
       return false;
   }
});

// Tampilkan tab pertama saat halaman dimuat
showTab(currentTab);