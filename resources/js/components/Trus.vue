<template>
    <div class="ms-3">
        <select name="trus" id="trus" class="form-control">
            <option v-for="item in items" :value="item.id">{{item.title}}</option>
        </select>
    </div>
</template>

<script>
    import {eventBus} from "../app";
    export default {
        name: "Trus",
        data() {
            return {
                items: []
            }
        },
        props: ['trus1', 'trus2'],
        created() {
            let self = this;
            $(document).ready(function () {
                $('[name="type_trus"]').change(function (e) {
                    e.preventDefault();
                    let v = $('input[name="type_trus"]:checked').val();
                    self.setData(v);
                });
            });
            this.setData('1');
        },
        methods: {
            setData(type) {
                if (type == '1') {
                    this.items = this.trus1;
                } else {
                    this.items = this.trus2;
                }
                setTimeout(() => {
                    eventBus.$emit("changeCalc");
                }, 100)
            }
        }
    }
</script>

