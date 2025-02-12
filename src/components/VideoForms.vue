<template>
    <div>
      <h1>Mis Transmisiones en Vivo</h1>
      <div class="video-container">
        <!-- Reemplaza el enlace del iframe con el de tu transmisión -->
        <iframe
          width="560"
          height="315"
          :src="streamUrl"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        // URL de tu transmisión en vivo (por ejemplo, YouTube o Twitch)
        streamUrl: "https://www.youtube.com/embed/live_stream?channel=carlitosemprende",
      };
    },
  };
  </script>
  
  <style>
  .video-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  </style>