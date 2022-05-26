<template>
    <div class="wrap_photos">
        <loading :active.sync="isLoading" :is-full-page="fullPage" loader="dots" />
        <div class="wrapFotoSelect">
            <div class="form-check">
                <input class="form-check-input"
                       v-model="photo_type"
                       value="default"
                       type="radio" name="photo_type" id="exampleRadios1" >
                <label class="form-check-label" for="exampleRadios1">
                    По умолчанию
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input"
                       v-model="photo_type"
                       value="my"
                       type="radio" name="photo_type" id="exampleRadios2" >
                <label class="form-check-label" for="exampleRadios2">
                    Загрузить
                </label>
            </div>
        </div>
        <div v-show="photo_type=='default'" class="mb-2 mt-4" >
            <template v-for="image in photos">
                <img :src="image" class="img-thumbnail">
            </template>
        </div>
        <div  v-show="photo_type=='my'" class="mt-4">
            <div class="form-group">
                <label for="img">Фото</label>
                <input type="file"
                       id="img"
                       name="file" class="form-control-file" >
                <img :src="base" class="img-thumbnail mt-2">
            </div>
        </div>
    </div>
</template>

<script>
    import Loading from "vue-loading-overlay";
    import "vue-loading-overlay/dist/vue-loading.css";
    import {eventBus} from "../app";
    export default {
        name: "Photos",
        data() {
            return {
                photo_type:'default',
                photos: [],
                base:'',
                isLoading: true,
                fullPage: false,
            }
        },
        components: {
            Loading,
        },
        mounted() {
            let self = this;
            $('[name="roofs"]').change(function (e) {
                self.getPhotos()
            });
            $('body').on('change', '[name="formroof"]', function () {
                self.getPhotos()
            });
            self.getPhotos();

            const fileInput  = document.getElementById('img');
            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                self.base = URL.createObjectURL(file);
                eventBus.$emit("changePhotos",{
                    base:self.base,
                });
            });
        },
        methods: {
            getPhotos() {
                let roof_id = $('[name="roofs"]').val();
                let formroof_id = $('[name="formroof"]:checked').val();
                axios.post('/getPhotos', {
                        roof_id: roof_id,
                        formroof_id: formroof_id
                    }
                )
                    .then(res => {
                        this.photos = res.data;
                        eventBus.$emit("changePhotos",{
                            photos:this.photos,
                            base:false,
                        });
                    })
                    .catch(err => {
                        console.error(err);
                    }).then(() => {
                    this.isLoading = false;
                })
            }
        },
        watch: {
            photo_type: function (val) {
                if(val=='default'){
                    eventBus.$emit("changePhotos",{
                        photos:this.photos,
                        base:false,
                    });
                }else{
                    eventBus.$emit("changePhotos",{
                        base:this.base,
                    });
                }
            },

        }
    }
</script>

<style scoped>
    .wrap_photos {
        position: relative;
    }
</style>
