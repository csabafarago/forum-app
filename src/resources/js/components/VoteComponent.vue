<template>
    <div class="container">
        <div v-if="authenticated === 1" @click="vote(post_id, csrf)">
            Vote
        </div>
        <div v-if="authenticated === 0">
            Sign in to vote.
        </div>
    </div>
</template>

<script>
export default {
    props: {
        authenticated: {
            type: Number,
            required: true
        },
        post_id: {
            type: Number,
            required: true
        },
        csrf: {
            type: String,
            required: true
        }
    }
}
</script>
