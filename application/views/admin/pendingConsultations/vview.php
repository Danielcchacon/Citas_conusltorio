<?php var_dump($pendingConsultationsindex)?>
<script> 
         document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendarMedico');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridDay',
                locale: 'es',
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: 'prev,next today'
                },
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