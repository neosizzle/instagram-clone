<template>
    <div class="container">
    <button class = "btn btn-primary m-auto" v-if="!isOwnProfile" @click="followUser" v-text="buttonText"></button>
    </div>
</template>
 
<script>

//todo, make sure the button wont render if authed user is in its own profile

    export default {

        props : ['userId' , 'follows', 'authUserId'],

        mounted(){

            console.log(this.authUserId)
        },
        
        methods : {
            followUser(){
                axios.post('/follow/' + this.userId)
                .then((res)=>{
                    alert('res')
                    this.follows = !this.follows
                    console.log(res.data)
                })
                .catch((e)=>{
                    alert('error')
                    //unauthed
                    if(e.response.status == 401){
                        window.location.href = '/login'
                    }
                    console.log(e)
                })
                
            }
        },
        
        computed : {
            buttonText(){
                return (this.follows == true)? 'Unfollow' : 'Follow';
            }
        },

        data:function(){
        return{
            isOwnProfile:(this.authUserId == this.userId)
        }
    }

    }
</script>
