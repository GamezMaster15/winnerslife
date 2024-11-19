<script setup>
import { VCalendar } from 'vuetify/lib/labs/components.mjs';
import { ref, onMounted } from 'vue';
import { useDate } from 'vuetify';

// Definición de variables reactivas
const today = ref(new Date());
const events = ref([]);
const colors = ['blue', 'indigo', 'deep-purple', 'cyan', 'green', 'orange', 'grey darken-1'];
const names = ['Generando Ventas', 'MLM con los Grandes', 'Conoce tu potencial', 'Llego la hora de despertar', 'Abre los Ojos', '+Amor = +Dinero', 'Conference', 'Premiacion de Rangos'];

// Instancia del adaptador de fecha
const adapter = useDate();

// Función para obtener eventos
const fetchEvents = ({ start, end }) => {
  const eventsList = [];
  const min = start;
  const max = end;
  const days = (max.getTime() - min.getTime()) / 86400000;
  const eventCount = rnd(days, days + 20);

  for (let i = 0; i < eventCount; i++) {
    const allDay = rnd(0, 3) === 0;
    const firstTimestamp = rnd(min.getTime(), max.getTime());
    const first = new Date(firstTimestamp - (firstTimestamp % 900000));
    const secondTimestamp = rnd(2, allDay ? 288 : 8) * 900000;
    const second = new Date(first.getTime() + secondTimestamp);

    eventsList.push({
      title: names[rnd(0, names.length - 1)],
      start: first,
      end: second,
      color: colors[rnd(0, colors.length - 1)],
      allDay: !allDay,
    });
  }

  events.value = eventsList;
};

// Función para generar un número aleatorio
const rnd = (a, b) => {
  return Math.floor((b - a + 1) * Math.random()) + a;
};

// Montar el componente y cargar eventos
onMounted(() => {
  fetchEvents({
    start: adapter.startOfDay(adapter.startOfMonth(new Date())),
    end: adapter.endOfDay(adapter.endOfMonth(new Date())),
  });
});
</script>

<template>
    <VRow>
      <vCol>
        <VCalendar
            ref="calendar"
            v-model="value"
            :events="events"
            :view-mode="type"
            :weekdays="weekday"
            class="p-3 bg-transparent"
        />
      </vCol>
    </VRow>
  </template>