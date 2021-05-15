<template>
    <div class="container">
        <select v-if="options" v-model="selected" @change="onChange($event)">
            <option v-for="option in options" v-bind:value="option.id">
                {{ option.name }}
            </option>
        </select>
    </div>
</template>

<script>
    export default {
        props: {
            options: {
                type: Array,
                required: true
            },
            // selected: {
            //     type: String,
            //     required: false
            // }
        },
        data: function () {
            return {
                selected: ''
            }
        },
        methods: {
            onChange(event) {
                var url = window.location.href;
                let new_url =url.split('?')[0] + '?category_id=' + this.selected;
                window.location.href = new_url;
            }
        }
    }
</script>
