<template>
    <div  class="ms-3">
        <select class="form-control" name="tube_2">
            <option v-for="item in items" :value="item.id">{{item.title}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        name: "RigelType",
        data() {
            return {
                items: [],
                type_rigel1: [],
                type_rigel2: [],
            }
        },
        created() {
            axios.get('/getTypeRigel')
                .then(res => {
                    this.type_rigel1 = res.data.type_rigel1;
                    this.type_rigel2 = res.data.type_rigel2;
                    this.setType(1);

                    let self = this;
                    $(document).ready(function () {
                        $('#rigel_types').change(function (e) {
                            e.preventDefault();
                            let v = $('#rigel_types').val();
                            self.setType(v);
                        });
                    });

                })
                .catch(err => {
                    console.error(err);
                })
        },
        methods: {
            setType(type) {
                if (type == 1) {
                    this.items = this.type_rigel1;
                } else {
                    this.items = this.type_rigel2;
                }
            }
        }
    }
</script>
