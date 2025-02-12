<script setup>
import { ref } from 'vue';
import imagePortada from '../assets/Portadaprueba.png'
import store from '../stores/index'
import VideoForms from '../components/VideoForms.vue'

console.log(imagePortada);

const handleIA = async (context) => {
    if(context === 'nombre_curso') {
        console.log(`Titulo: ${dataCourse.value.nombre_curso}`);
        
        const ia = await store.dispatch('iahelp', {ask : `Titulo: ${dataCourse.value.nombre_curso}`})
        dataCourse.value.nombre_curso_old = dataCourse.value.nombre_curso
        dataCourse.value.nombre_curso = ia    
        
    }
}

const dataCourse = ref({
    nombre_curso: '',
    img: '',
    imgName: '',
    description: '',
    nombre_curso_old : ''
});

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        dataCourse.value.img = URL.createObjectURL(file);
        dataCourse.value.imgName = file.name;
    }
};

const next = ref(1)

const handleNext = () => {
    next.value += 1;  
}

const handleBack = () => {
    next.value -= 1;  
}

/**/

</script>

<template>
    
    <div class="container-fluid my-5 h-100 w-100">
        <div class="row d-flex h-100">
            <div class="col-6 text-center align-content-center">                
                <h4 class="d-inline-flex pb-5">Crear Curso</h4>

                <input type="text" class="w-100 text-center inputAdd" placeholder="¿Cual es el nombre del curso?" v-model="dataCourse.nombre_curso" v-if="next === 1">
                <button class="btn text-white d-inline-flex mt-4" @click="handleIA('nombre_curso')"  v-if="next === 1"><i class="fi fi-rr-artificial-intelligence border rounded-circle p-2 px-3 m-0"></i></button>
                
                <p v-if="next === 2" class="text-capitalize">{{dataCourse.imgName || 'Agrega la portada del curso'}}</p>
                <input type="file" class="text-center w-50 mx-auto border" v-if="next === 2" @change="handleFileChange"> <br v-if="next === 2">

                
                <p v-if="next === 3">Agrega la descripcion</p>
                <textarea name="description" id="" v-model="dataCourse.description" class="inputAdd w-75 border small-text p-2 px-3" placeholder="Bienvenido a Transforma tu Vida, un curso diseñado para empoderarte en tu viaje hacia el desarrollo personal y el éxito financiero a través del Marketing Multinivel (MLM). Este curso es ideal para aquellos que buscan mejorar su situación económica y alcanzar sus metas personales, utilizando estrategias probadas en el mundo del MLM." v-if="next === 3" rows="8"></textarea> <br v-if="next === 3">

                <p v-if="next === 4">Su Curso se divide por secciones</p>
                <button v-if="next === 4">SI</button> 
                <button v-if="next === 4" >NO</button>
                 <br v-if="next === 4">

                 <br><span class="d-inline-flex pt-5 pb-5">Paso {{next}}</span><br>
                <button class="btn text-white" v-if="next > 1" @click="handleBack"><i class="fi fi-rr-angle-small-left border rounded-circle p-2 px-3 m-0"></i></button>
                <button class="btn text-white" v-if="dataCourse.nombre_curso.length >= 3" @click="handleNext"><i class="fi fi-rr-angle-small-right border rounded-circle p-2 px-3 m-0"></i></button>
            </div>
            <div class="col-6 align-content-center p-4 px-5 bg-dark rounded" v-if="next < 4">                
                <p class="text-center">Vista Previe del Curso</p>
                <img :src="dataCourse.img || imagePortada" class="w-100 mb-4 rounded" alt="">
                <h5 class="text-left">{{ dataCourse.nombre_curso || 'Titulo del Curso' }}</h5>
                <p>{{ dataCourse.description || 'Descripcion del curso Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda nobis quae ea, neque veritatis debitis a saepe veniam nihil voluptatem animi vel dignissimos provident quia recusandae autem praesentium rerum voluptatum.' }}</p>
            </div>
        </div>
    </div>

</template>