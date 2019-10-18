<template>
    <card collapsible
        :loading="loading">
        <card-header class="has-background-light">
            <template v-slot:title>
                {{ application.name }}
            </template>
            <template v-slot:controls>
                <card-control>
                    <span class="icon is-small"
                        v-tooltip="application.description">
                        <fa icon="info-circle"/>
                    </span>
                </card-control>
                <card-refresh @refresh="fetch"/>
                <card-collapse/>
            </template>
        </card-header>
        <card-content class="is-paddingless">
            <table class="table application is-fullwidth is-marginless is-hoverable">
                <tr>
                    <td>
                        {{ i18n('Logins') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.logins) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ i18n('Actions') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.actions) }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ i18n('Sessions') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.sessions) }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ i18n('Failed Jobs') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.failedJobs) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ i18n('Users') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.users) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ i18n('Active Users') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.activeUsers) }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ i18n('New Users') }}
                    </td>
                    <td class="has-text-right is-bold">
                        {{ format(statistics.newUsers) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ i18n('Server Time') }}
                    </td>
                    <td class="has-text-right is-bold"
                        colspan="2">
                        {{ statistics.serverTime }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ i18n('Version') }}
                    </td>
                    <td class="has-text-right is-bold">
                        v{{ statistics.version }}
                    </td>
                </tr>
                <tr v-if="application.type === Enso">
                    <td>
                        {{ i18n('Log Size') }}
                    </td>
                    <td class="has-text-right is-bold is-narrow">
                        {{ statistics.logSize }}
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ i18n('Status') }}
                    </td>
                    <td class="has-text-right is-bold"
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
        </card-content>
        <card-footer>
            <card-footer-item class="has-padding-medium">
                <confirmation placement="bottom"
                    @confirm="maintenance()">
                    <span class="icon is-small is-clickable">
                        <fa icon="power-off"
                            size="xs"/>
                    </span>
                    <span>{{ i18n('App') }}</span>
                </confirmation>
            </card-footer-item>
            <card-footer-item class="has-padding-medium">
                <confirmation placement="bottom"
                    @confirm="clearLog()">
                    <span class="icon is-small is-clickable">
                        <fa icon="trash-alt"
                            size="xs"/>
                    </span>
                    <span>{{ i18n('Log') }}</span>
                </confirmation>
            </card-footer-item>
        </card-footer>
    </card>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faTrashAlt, faPowerOff, faInfoCircle } from '@fortawesome/free-solid-svg-icons';
import { VTooltip } from 'v-tooltip';
import {
    Card, CardHeader, CardControl, CardRefresh, CardCollapse,
    CardContent, CardFooter, CardFooterItem, Confirmation
} from '@enso-ui/bulma';

library.add(faTrashAlt, faPowerOff, faInfoCircle);

export default {
    name: 'Application',

    directives: { tooltip: VTooltip },

    components: {
        Card, CardHeader, CardControl, CardRefresh, CardCollapse,
        CardContent, CardFooter, CardFooterItem, Confirmation
    },

    inject: ['i18n', 'errorHandler', 'route'],

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

    data: () => ({
        loading: false,
        statistics: {},
        Enso: 2,
    }),

    created() {
        this.fetch();
    },

    methods: {
        fetch() {
            this.loading = true;
            axios.post(
                this.route('controlPanel.statistics', this.application.id),
                { startDate: this.dates.min, endDate: this.dates.max, type: this.application.type },
            ).then(({ data }) => {
                this.statistics = data;
                this.loading = false;
                this.$emit('loaded');
            }).catch(this.errorHandler);
        },
        maintenance() {
            this.loading = true;
            axios.post(this.route('controlPanel.maintenance', this.application.id))
                .then(({ data }) => {
                    this.statistics.status = data.status;
                    this.loading = false;
                }).catch(this.errorHandler);
        },
        clearLog() {
            this.loading = true;
            axios.post(this.route('controlPanel.clearLog', this.application.id))
                .then(({ data }) => {
                    this.statistics.logSize = data.logSize;
                    this.loading = false;
                }).catch(this.errorHandler);
        },
        format(value) {
            if (typeof value === 'undefined') {
                return null;
            }

            value = value.toString();
            const rgx = /(\d+)(\d{3})/;

            while (rgx.test(value)) {
                value = value.replace(rgx, '$1,$2');
            }

            return value;
        },
    },
};
</script>

<style lang="scss">
    .table.application {
        font-size: 0.9rem;

        .tag {
            font-size: 0.8rem;
            font-weight: bold;
            height: 1.4em;
        }
    }
</style>
