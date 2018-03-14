<template>
    <div>

        <list-select :list="options"
                     option-text="name"
                     option-value="id"
                     :selected-item="item"
                     placeholder="Select category"
                     @select="onSelect">
        </list-select>

        <div class="list-group mt-2">
            <a v-for="site in item.sites" :href="site.url" target="_blank" class="list-group-item">{{site.url}}</a>
        </div>

    </div>
</template>

<script>
    import {ListSelect} from 'vue-search-select'

    export default {
        components: {
            ListSelect
        },
        props: ['data'],
        data() {
            return {
                options: [],
                searchText: '',
                item: {
                    id: '',
                    name: '',
                    sites: []
                }
            }
        },
        methods: {
            onSelect(item) {
                this.item = item
            },
            reset() {
                this.item = {}
            },
            selectOption() {
                this.item = this.options[0]
            }
        },

        mounted() {
            this.options = JSON.parse(JSON.stringify(this.data));
        }
    }
</script>

<style>
    .mt-2 {
        margin-top: 1em;
    }
</style>