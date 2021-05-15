<template>
    <div class="container">
        <div v-if="authenticated === 1">
            <span class="bg-green-500 hover:bg-green-700 pl-2 pr-2 mr-2 rounded-lg" v-if="postVoted === 0" @click="grantVote">
                Vote
            </span>
            <span class="bg-red-500 hover:bg-red-700 pl-2 pr-2 mr-2 rounded-lg" v-if="postVoted === 1" @click="revokeVote">
                Revoke my vote
            </span>
            {{ totalVote }} Votes
        </div>
        <div v-if="authenticated === 0">
            Sign in to vote.
        </div>
    </div>
</template>

<script>
import Vue from "vue";

export default {
    props: {
        authenticated: {
            type: Number,
            required: true,
        },
        post_id: {
            type: Number,
            required: true,
        },
        votes_count: {
            type: Number,
            required: true,
        },
        voted: {
            type: Number,
            required: true,
        }
    },
    data: function(){
        return {
            totalVote: this.votes_count,
            postVoted: this.voted,
        }
    },
    methods: {
        grantVote: function(){
            this.postVoted = 1
            this.vote(this.post_id, true);
        },
        revokeVote: function(){
            this.postVoted = 0
            this.vote(this.post_id, false);
        },
        vote: function(post_id, toggle_counter){
            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            axios.post('/vote/' + post_id, {token: csrf})
                .then(response => {
                    if(response.data.result){
                        if(toggle_counter){
                            this.totalVote++;
                        } else {
                            this.totalVote--;
                        }
                    }
                })
                .catch(error => {
                    this.errorMessage = error.message;
                    console.error("There was an error!", error);
                });
        }
    },
    computed: {
        // totalVote() {
        //     return this.votes_count;
        // },
        // postVoted() {
        //     return this.voted;
        // },
    }
}
</script>
