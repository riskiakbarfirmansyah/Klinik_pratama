<script src="{{ asset ('vendor/jquery/jquery.min.js') }}"></script>

<script src= "{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src= "{{ asset ('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src= "{{ asset ('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js   "></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


@stack('scripts')

<script>
    // Auto scroll chat area ke bawah setiap update Livewire
    function scrollToBottom() {
        let area = document.getElementById('messages-area');
        if(area) area.scrollTop = area.scrollHeight;
    }

    document.addEventListener('livewire:load', function () {
        scrollToBottom();
        if (window.Livewire) {
            Livewire.hook('message.processed', (message, component) => {
                scrollToBottom();
            });
        }
    });

    document.addEventListener('submit', function(e) {
        if (e.target.closest('form[wire\\:submit\\.prevent="sendMessage"]')) {
            setTimeout(scrollToBottom, 300);
        }
    });
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "/piechart",
            type: 'get',
            success: function(response){
                var xValues = ["Laki-Laki", "Perempuan"];
                var yValues = [response.laki, response.perempuan];
                var barColors = [
                    "#00aba9",
                    "#b91d47"

                ];

                new Chart("myPie", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Klasifikasi Pasien Berdasarkan Gender"
                        }
                    }
                });
            }
        });

        $.ajax({
            url: "/piechart",
            type: "get",
            success: function(response) {
                var yValues = [response.asuransi, response.umum];
                var xValues = ["Asuransi", "Umum"];
                var barColors = [
                    "rgba(66, 135, 245)",
                    "rgba(114, 245, 66)"

                ];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Klasifikasi Berdasarkan Penggunaan Layanan"
                        }
                    }
                });
            }
        });
    });
</script>
