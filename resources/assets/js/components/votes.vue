<template>
    <div class="panel-footer">
        <p>Total Votes : {{ cnt }}</p>
            <div class="btn btn-success btn-s" @click = "increase">Up</div>
            <div class="btn btn-danger btn-s" @click = "decrease">Down</div>
        
    </div>
</template>

<script>
    export default {
        props: [

            'cnt',
            'id',
        ],
        data(){

            return{
            }
        },

        methods: {

            increase: function(){

                axios.post("http://127.0.0.1:8000/fetch/" + this.id);

            },

            decrease: function(){

                axios.post("http://127.0.0.1:8000/fetch2/" + this.id);

            }
        }


    }
</script>
