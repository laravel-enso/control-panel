<template>
    <div>
        <div class="columns is-centered">
            <div class="column is-half">
                <date-interval-filter class="box is-raised"
                    title="Date interval"
                    :min="dates.min"
                    @update-min="dates.min = $event"
                    :max="dates.max"
                    @update-max="dates.max = $event"/>
            </div>
        </div>
        <div class="columns is-multiline is-mobile">
            <div class="column is-one-fifth-fullhd is-one-quarter-widescreen is-one-third-tablet is-half-mobile"
                v-for="(application, index) in applications"
                :key="index">
                <application class="is-raised"
                    :application="application"
                    :dates="dates"/>
            </div>
        </div>
    </div>
</template>

<script>

import Application from '../../components/enso/controlPanel/Application.vue';
import DateIntervalFilter from '../../components/enso/bulma/DateIntervalFilter.vue';

export default {
    components: { Application, DateIntervalFilter },

    data() {
        return {
            applications: [],
            dates: {
                min: new Date(),
                max: null,
            },
        };
    },

    created() {
        this.dates.max = new Date(this.dates.min.getTime() + (24 * 60 * 60 * 1000));

        this.fetch();
    },

    methods: {
        fetch() {
            axios.get(route('administration.applications.index'))
                .then(({ data }) => (this.applications = data))
                .catch(error => this.handleError(error));
        },
    },
};

</script>
