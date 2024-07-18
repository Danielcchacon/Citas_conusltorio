    </div>

    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="./vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="./vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="./vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="./vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="./vendors/Flot/jquery.flot.js"></script>
    <script src="./vendors/Flot/jquery.flot.pie.js"></script>
    <script src="./vendors/Flot/jquery.flot.time.js"></script>
    <script src="./vendors/Flot/jquery.flot.stack.js"></script>
    <script src="./vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="./vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="./vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="./vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="./vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="./vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="./vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="./vendors/moment/min/moment.min.js"></script>
    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Tempus Dominus JS -->
    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
    <!-- FullCalendar JS localmente -->
    <script src="./vendors/fullcalendar/dist/index.global.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.0.0-beta.6/dist/js/tempus-dominus.min.js"></script>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
      // Función para abrir el modal y mostrar la fecha seleccionada
      window.abrirModal = function(info) {
                document.getElementById('selectedDate').textContent = 'Fecha seleccionada: ' + info.dateStr;
                $('#dateModal').modal('show'); // Abre el modal usando jQuery
            }

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                    center: 'title',
                    right: 'prev,next today'
                },
                dateClick: function(info) {
                    abrirModal(info); // Llama a la función para abrir el modal con la fecha seleccionada
                }
            });
            calendar.render();

            // Inicializar Tempus Dominus para el selector de hora
            $('#horaPicker').datetimepicker({
                format: 'HH:mm',
                icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-calendar-check-o',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                }
            });

      

            // Función para agregar cita (simulación)
            window.agregarCita = function() {
                var medico = document.getElementById('selectMedico').value;
                var paciente = document.getElementById('selectPaciente').value;
                var fecha = document.getElementById('selectedDate').textContent.replace('Fecha seleccionada: ', '');
                var hora = document.getElementById('hora').value;
                console.log('Médico seleccionado:', medico);
                console.log('Paciente seleccionado:', paciente);
                console.log('Fecha seleccionada:', fecha);
                console.log('Hora seleccionada:', hora);
                // Aquí puedes implementar la lógica para agregar la cita, por ejemplo, enviar datos a una API o procesar en el backend
                // Después de agregar la cita, cierra el modal
                $('#dateModal').modal('hide');
            }
        });
    </script>
</body>
</html>