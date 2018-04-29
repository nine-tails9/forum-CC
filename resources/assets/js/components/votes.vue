<template>
    <div class="panel-footer">
        <p>Total Votes : {{ cnt }}</p>
            <div class="btn btn-success btn-s" @click = "increase" v-if="!upvoted">Up</div>
            <div class="btn btn-danger btn-s" @click = "decrease" v-if="!downvoted">Down</div>
        
    </div>
</template>

<script>
    export default {
        props: [

            'cnt',
            'id',
            'user',
            'qid'
        ],
        created: function(){

            axios.get("http://127.0.0.1:8000/check/" + this.user).then((response)=>{
            
                    for(var i = 0; i < response.data[0].length; i++)
                        if(response.data[0][i].question_id == this.qid)
                        {  
                            if(response.data[0][i].upvoted == 1)this.upvoted = true;
                            if(response.data[0][i].downvoted == 1)this.downvoted = true;
                        }

            });


        },
        data(){

            return{

                upvoted: false,
                downvoted: false,
             
            }
        },

        methods: {

            increase: function(){

                axios.post("http://127.0.0.1:8000/fetch/" + this.id + "/" + this.qid);
                axios.post("http://127.0.0.1:8000/upvote/" + this.qid);
                this.upvoted = true;
                this.downvoted = false;

            },

            decrease: function(){

                axios.post("http://127.0.0.1:8000/fetch2/" + this.id + "/" + this.qid);
                axios.post("http://127.0.0.1:8000/downvote/" + this.qid);

                this.downvoted = true;
                this.upvoted = false;
            }
        }


    }
</script>
