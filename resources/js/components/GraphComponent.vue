<template>
<div>
<line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
<input type="checkbox" v-model="realtime">
<input type="text" v-model="label">
<input type="text" v-model="sale">
<button @click="sendData" class="btn btn-primary">Выгрузить</button>
</div>
</template>

<script>
console.log('adwadawd');
    import LineChart from './LineChart.js'
    export default {
        components: {
            LineChart
        },
        data : function(){
            return {
                data: [],
                label: '',
                sale: 100,
                realtime: false
            }
        },
        mounted() {
            Echo.channel('graph')
                .listen('TranslationEvent', (e) => {
                    this.data = e.result;
                });
            this.update()
        },
        methods: {
            update: function(){
                axios.get('/graph/get').then((response) => {
                    this.data = response.data
                });
            },
            sendData: function(){
                axios({
                    method: 'get',
                    url: '/graph/get',
                    params: {label: this.label, sale: this.sale, realtime: this.realtime}
                }).then((response) => {
                    this.data = response.data
                });
            }
        }
    }

</script>