<template>
    <div class="container">
        <button @click="add" class="btn btn-light" role="button"> <span class="h4">Add to <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/></svg></span></button>
    </div>
</template>

<script>
    export default {
        props: ['product_id'],

        methods: {
            add() {
                axios.get('/shopping_cart/add_item/' + this.product_id).then(response => {
                    location.reload();
                    return false;
                }).catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = '/login';
                    }
                });
            }
        },
    }
</script>
