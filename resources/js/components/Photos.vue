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
        <div v-if="photo_type=='default'" class="mb-2 mt-4" v-for="image in photos">
            <img :src="image" class="img-thumbnail">
        </div>
        <div v-else class="mt-4">
            <div class="form-group">
                <label for="exampleFormControlFile1">Фото</label>
                <input type="file"
                       accept="image/png, image/jpeg"
                       name="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>
    </div>
</template>

<script>
    import Loading from "vue-loading-overlay";
    import "vue-loading-overlay/dist/vue-loading.css";

    export default {
        name: "Photos",
        data() {
            return {
                photo_type:'default',
                photos: [],
                isLoading: true,
                fullPage: false,
            }
        },
        components: {
            Loading,
        },
        created() {

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
                        console.log(res.data)
                        this.photos = res.data;
                    })
                    .catch(err => {
                        console.error(err);
                    }).then(() => {
                    this.isLoading = false;
                })
            }
        }
    }
</script>

<style scoped>
    .wrap_photos {
        position: relative;
    }
</style>
