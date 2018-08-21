<template>
    <card header
        refresh
        :title="application.name"
        :overlay="loading"
        :controls="1"
        @refresh="fetch()">
        <card-control slot="control-1">
            <span class="icon is-small card-header-icon"
                v-tooltip="application.description">
                <fa icon="info-circle"
                    size="sm"/>
            </span>
        </card-control>
        <div class="has-padding-top-small has-padding-bottom-small">
            <table class="table is-fullwidth is-marginless is-hoverable">
                <tr>
                    <td colspan="2">
                        {{ __('Logins') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.logins }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ __('Actions') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.actions }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td colspan="2">
                        {{ __('Sessions') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.sessions }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td colspan="2">
                        {{ __('Failed Jobs') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.failedJobs }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ __('Users') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.users }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ __('Active Users') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.activeUsers }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td colspan="2">
                        {{ __('New Users') }}
                    </td>
                    <td class="has-text-right">
                        {{ statistics.newUsers }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('Server Time') }}
                    </td>
                    <td class="has-text-right"
                        colspan="2">
                        {{ statistics.serverTime }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ __('Log Size') }}
                    </td>
                    <td class="is-narrow has-text-right">
                        <popover placement="bottom"
                            @confirm="clearLog()">
                            <span class="icon is-small is-clickable">
                                <fa icon="trash-alt"
                                    size="xs"/>
                            </span>
                        </popover>
                    </td>
                    <td class="has-text-right is-narrow">
                        {{ statistics.logSize }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('Status') }}
                    </td>
                    <td class="is-narrow has-text-right"
                        v-if="application.type === Enso">
                        <popover placement="bottom"
                            @confirm="maintenance()">
                            <span class="icon is-small is-clickable">
                                <fa icon="power-off"
                                    size="xs"/>
                            </span>
                        </popover>
                    </td>
                    <td class="has-text-right"
                        :colspan="application.type === Enso ? 1 : 2">
                        <span :class="[
                                'tag',
                                statistics.status === 'up'
                                    ? 'is-success'
                                    : 'is-warning']
                            ">
                            {{ statistics.status }}
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </card>
</template>

<script>

import { library } from '@fortawesome/fontawesome-svg-core';
import { faTrashAlt, faPowerOff, faInfoCircle } from '@fortawesome/free-solid-svg-icons';
import { VTooltip } from 'v-tooltip';
import Card from '../bulma/Card.vue';
import CardControl from '../bulma/CardControl.vue';
import Popover from '../bulma/Popover.vue';

library.add(faTrashAlt, faPowerOff, faInfoCircle);

export default {
    name: 'Application',

    directives: { tooltip: VTooltip },

    components: { Card, CardControl, Popover },

    props: {
        application: {
            type: Object,
            required: true,
        },
        dates: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            loading: false,
            statistics: true,
            Enso: 2,
        };
    },

    created() {
        this.fetch();
    },

    methods: {
        fetch() {
            this.loading = true;
            axios.post(
                route('controlPanel.statistics', this.application.id),
                { startDate: this.dates.min, endDate: this.dates.max, type: this.application.type },
            ).then(({ data }) => {
                this.statistics = data;
                this.loading = false;
            }).catch(error => this.handleError(error));
        },
        maintenance() {
            this.loading = true;
            axios.post(route('controlPanel.maintenance', this.application.id))
                .then(({ data }) => {
                    this.statistics.status = data.status;
                    this.loading = false;
                }).catch(error => this.handleError(error));
        },
        clearLog() {
            this.loading = true;
            axios.post(route('controlPanel.clearLog', this.application.id))
                .then(({ data }) => {
                    this.statistics.logSize = data.logSize;
                    this.loading = false;
                }).catch(error => this.handleError(error));
        },
    },
};
</script>

<style lang="scss" scoped>

    .table {
        font-size: 1rem;
        font-weight: 600;

        .tag {
            font-size: 0.8rem;
            font-weight: bold;
            height: 1.4em;
        }
    }

</style>

