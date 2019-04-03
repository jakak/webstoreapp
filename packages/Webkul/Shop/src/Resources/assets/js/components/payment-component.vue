<template>
    <paystack
        :amount="amount"
        :email="email"
        :paystackkey="publicKey"
        :reference="referenceCode"
        :callback="callback"
        :close="close"
        :embed="false"
        >
       Make Payment
    </paystack>
</template>

<script>
    export default {
        name: "payment-component",
        props: {
            email: {
                type: String,
                required: true,
            },
            publicKey: {
                type: String,
                required: true,
            },
            referenceCode: {
                type: String,
                required: true
            },
            amount: {
                type: String,
                required: true,  
            }

        },

        methods: {
            callback(data) {
                if (data.status == 'success') {
                    this.$parent.validateForm('payment-form');
                }
            },
            close(data) {
                console.dir(data);
            }
        }
    }
</script>