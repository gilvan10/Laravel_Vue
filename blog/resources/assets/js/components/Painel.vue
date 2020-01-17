<template>

    <div v-bind:class="defineCor">
        <div class="panel-heading">{{titulo}}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>

</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "panel-default");
            }
        }
    }
</script>

<style media="screen">
    .blue {
         border-color: #0c73ad;
     }
    .blue > .panel-heading {
        color: #f5f8fa;
        background-color: #0c73ad;
        border-color: #0c73ad;
    }
    .orange {
        border-color: #ff8a3d;
    }
    .orange > .panel-heading {
        color: #f5f8fa;
        background-color: #ff8a3d;
        border-color: #ff8a3d;
    }
</style>
