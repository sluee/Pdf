<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})

let bal = Number(props.client.initial_deposit);

</script>

<template>
    <Head title="View Client" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Client</h2>
                <a :href="'/clients/pdf/'+client.id" class="flex p-2 rounded border border-gray-300 shadow" target="blank">
                <svg viewBox="0 0 512 512" version="1.1" height="30px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#6666"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pdf-document</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="add" fill="#000000" transform="translate(85.333333, 42.666667)"> <path d="M75.9466667,285.653333 C63.8764997,278.292415 49.6246897,275.351565 35.6266667,277.333333 L1.42108547e-14,277.333333 L1.42108547e-14,405.333333 L28.3733333,405.333333 L28.3733333,356.48 L40.5333333,356.48 C53.1304778,357.774244 65.7885986,354.68506 76.3733333,347.733333 C85.3576891,340.027178 90.3112817,328.626053 89.8133333,316.8 C90.4784904,304.790173 85.3164923,293.195531 75.9466667,285.653333 L75.9466667,285.653333 Z M53.12,332.373333 C47.7608867,334.732281 41.8687051,335.616108 36.0533333,334.933333 L27.7333333,334.933333 L27.7333333,298.666667 L36.0533333,298.666667 C42.094796,298.02451 48.1897668,299.213772 53.5466667,302.08 C58.5355805,305.554646 61.3626692,311.370371 61.0133333,317.44 C61.6596233,323.558965 58.5400493,329.460862 53.12,332.373333 L53.12,332.373333 Z M150.826667,277.333333 L115.413333,277.333333 L115.413333,405.333333 L149.333333,405.333333 C166.620091,407.02483 184.027709,403.691457 199.466667,395.733333 C216.454713,383.072462 225.530463,362.408923 223.36,341.333333 C224.631644,323.277677 218.198313,305.527884 205.653333,292.48 C190.157107,280.265923 170.395302,274.806436 150.826667,277.333333 L150.826667,277.333333 Z M178.986667,376.32 C170.098963,381.315719 159.922142,383.54422 149.76,382.72 L144.213333,382.72 L144.213333,299.946667 L149.333333,299.946667 C167.253333,299.946667 174.293333,301.653333 181.333333,308.053333 C189.877212,316.948755 194.28973,329.025119 193.493333,341.333333 C194.590843,354.653818 189.18793,367.684372 178.986667,376.32 L178.986667,376.32 Z M254.506667,405.333333 L283.306667,405.333333 L283.306667,351.786667 L341.333333,351.786667 L341.333333,329.173333 L283.306667,329.173333 L283.306667,299.946667 L341.333333,299.946667 L341.333333,277.333333 L254.506667,277.333333 L254.506667,405.333333 L254.506667,405.333333 Z M234.666667,7.10542736e-15 L9.52127266e-13,7.10542736e-15 L9.52127266e-13,234.666667 L42.6666667,234.666667 L42.6666667,192 L42.6666667,169.6 L42.6666667,42.6666667 L216.96,42.6666667 L298.666667,124.373333 L298.666667,169.6 L298.666667,192 L298.666667,234.666667 L341.333333,234.666667 L341.333333,106.666667 L234.666667,7.10542736e-15 L234.666667,7.10542736e-15 Z" id="document-pdf"> </path> </g> </g> </g></svg>
                    Export
                </a>
            </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
                <div class="bg-white p-4 rounded shadow w-[30%]">
                    <h4 class="text-2xl mb-3 ">Client Info</h4>
                    <hr>
                    <table class="min-w-[100%] table">
                        <thead>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ client.last_name }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ client.first_name }}</td>
                            </tr>
                            <tr>
                                <th>Middle Name</th>
                                <td>{{ client.middle_name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ client.address }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ client.phone_number }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="bg-white p-4 rounded shadow w-[68%]">
                    <h4 class="text-2xl mb-3">Transaction Log</h4>

                    <table class="table table-auto min-w-[100%] ">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Deposit</th>
                                <th>Withdrawal</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">Beginning Balance</td>
                                <td class="text-right">{{ (+client.initial_deposit).toLocaleString('en-US') }}</td>
                            </tr>
                            <tr v-for="txn in client.transactions" :key="txn.id">
                                <td>{{ txn.date }}</td>
                                <td class="text-right">{{ txn.deposit ? (+txn.amount).toLocaleString('en-US') : '&nbsp;' }}</td>
                                <td class="text-right">{{ !txn.deposit ? (+txn.amount).toLocaleString('en-US') : '&nbsp;' }}</td>
                                <td class="text-right">{{ (bal+= txn.deposit ? Number(txn.amount) : (0-txn.amount)).toLocaleString('en-US') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
