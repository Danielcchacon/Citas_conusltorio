<style>

.fc-day-today {
    background-color: #b4c0cd !important;
}
</style>

<div class="container">
    <h2>Citas pendientes</h2>
    <div style="width:100%" id="calendarMedico"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var citas = <?php echo json_encode($pendingConsultationsindex); ?>;

        var eventos = citas.map(function(cita) {
            return {
                title: cita.nombre_paciente + ' con ' + cita.nombre_medico,
                start: cita.fecha_consulta
            };
        });

        var calendarEl = document.getElementById('calendarMedico');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridDay',
            locale: 'es',
            headerToolbar: {
                left: '',
                center: 'title',
                right: 'prev,next today'
            },
            events: eventos, // Añadir eventos aquí
            dateClick: function(info) {
                // Mostrar la fecha seleccionada en el modal
                document.getElementById('selectedDate').innerText = 'Fecha seleccionada: ' + info.dateStr;

                // Abrir el modal
                var modal = document.getElementById('dateModal');
                modal.classList.add('show');
                modal.style.display = 'block';
                modal.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modal-open');

                var modalBackdrop = document.createElement('div');
                modalBackdrop.className = 'modal-backdrop fade show';
                document.body.appendChild(modalBackdrop);
            }
        });

        calendar.render();
    });
</script>
