<template>
    <form class="event-form">
        <div class="stepper">
            <ul>
                <li class="step"><a href="" class="active">General informations</a></li>
                <li class="step"><a href="">Pricing and paiement</a></li>
                <li class="step"><a href="">Additionnal informations</a></li>
            </ul>
        </div>
        <section>
            <div class="section-title">
                <h1 class="h5">About event</h1>
            </div>
            <div class="section-content">
                <div class="form-group">
                    <label>Event title</label>
                    <input type="text" class="form-control" v-model="name"   placeholder='Event title' v-bind:class="{'is-invalid' : errors.name}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <wysiwyg v-model="about" v-bind:class="{'is-invalid' : errors.about}"/>
                </div>
            </div>
        </section>
        <section>
            <div class="section-title">
                <h1 class="h5">What is the category of your event?</h1>
            </div>
            <div class="section-content">
                <div class="categories-list">
                    <label class="category" v-for="categoryData in datas.categories" v-bind:class="{'active' : categoryData.id == category}">
                        <div class="ico"><i class="icon ion-ios-microphone"></i></div>
                        <div class="title">{{ categoryData.name }}</div>
                        <input type="radio" :value="categoryData.id" v-model="category">
                    </label>
                </div>
            </div>
        </section>
        <section>
            <div class="section-title">
                <h1 class="h5">When this event be?</h1>
            </div>
            <div class="section-content">
                <div class="form-row">
                    <div class="col-4 offset-md-2">
                        <label>Start date</label>
                        <flat-pickr v-model="startDate"
                                    class="form-control"
                                    :config="configDate"
                                    placeholder="Select date"></flat-pickr>
                    </div>
                    <div class="col-4">
                        <label>Start Time</label>
                        <flat-pickr v-model="startTime"
                                    class="form-control"
                                    :config="configTime"
                                    placeholder="Select date"></flat-pickr>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="section-title">
                <h1 class="h5">Where this event be?</h1>
            </div>
            <div class="section-content">
                <div class="form-row">
                    <label>Event Location</label>
                    <input type="text" class="form-control" v-model="location"  placeholder='Event location'>
                    <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
            </div>
        </section>

    </form>
</template>

<script>
    export default {
        name: "CreateEvent",
        data () {
            return {
                datas : {
                    categories : null
                },
                name : null,
                about : null,
                location : null,
                category : null,
                startDate : new Date(),
                startTime : new Date(),
                configDate: {
                    wrap: true, // set wrap to true only when using 'input-group'
                    altFormat: 'M	j, Y',
                    altInput: true,
                    dateFormat: 'Y-m-d',
                    locale: 'en', // locale for this instance only
                    minDate : new Date()
                },
                configTime: {
                    wrap: true, // set wrap to true only when using 'input-group'
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                },
            }
        },
        methods : {
            save(){
                axios.post('/create').then((response) => {
                    console.log(response.data)
                })
            },
            getCategories(){
                axios('/api/categories')
                    .then((response) => {
                        this.datas.categories = response.data
                        this.category = this.datas.categories[0]
                    })
            }
        },
        mounted() {
            this.getCategories()
        }
    }
</script>

<style scoped>

</style>