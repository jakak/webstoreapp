<template>
    <div>
        <div class="image-wrapper">
            <image-item
                v-for='(image, index) in items'
                :key='image.id'
                :image="image"
                :input-name="inputName"
                :name="inputName"
                :remove-button-label="removeButtonLabel"
                @onRemoveImage="removeImage($event)"
                :size="size"
            ></image-item>
        </div>

        <label class="btn btn-lg btn-primary" style="display: inline-block; width: auto" @click="createFileType">{{ buttonLabel }}</label>
        <span class="sub-title" v-if="hasSubtitle">
          {{ subTitle }}
        </span>
    </div>
</template>

<script>
    export default {
        props: {
            buttonLabel: {
                type: String,
                required: false,
                default: 'Add Image'
            },

            removeButtonLabel: {
                type: String,
                required: false,
                default: 'Remove Image'
            },

            inputName: {
                type: String,
                required: false,
                default: 'attachments'
            },

            images: {
                type: Array|String,
                required: false,
                default: () => ([])
            },

            size: {
              type: String,
              required: false,
              default: ''
            },

            subTitle: {
              type: String,
              required: false,
            },

            multiple: {
                type: Boolean,
                required: false,
                default: true
            },
            urlTransform: {
                type: String,
                required: false,
                default: ''
            },
            enforceSquare: {
                type: Boolean,
                required: false,
                default: false
            }
        },

        data: function() {
            return {
                imageCount: 0,
                items: []
            }
        },

        created () {
            var this_this = this;

            if(this.multiple) {
                if(this.images.length) {
                    this.images.forEach(function(image) {
                        this_this.items.push(image)

                        this_this.imageCount++;
                    });
                } else {
                    this.createFileType();
                }
            } else {
                if(this.images && this.images != '') {
                    this.items.push({'id': 'image_' + this.imageCount, 'url': this.images})

                    this.imageCount++;
                } else {
                    this.createFileType();
                }
            }

            this.transformImageUrl();
        },

        methods: {
            createFileType () {
                var this_this = this;

                if(!this.multiple) {
                    this.items.forEach(function(image) {
                        this_this.removeImage(image)
                    });
                }

                this.imageCount++;

                this.items.push({'id': 'image_' + this.imageCount});
            },

            removeImage (image) {
                let index = this.items.indexOf(image)

                Vue.delete(this.items, index);
            },

            transformImageUrl() {
                if (this.urlTransform !== 'no-transform') {
                    let prefix = '/';
                    if (window.location.href.includes('public')) {
                        prefix = '/public/';
                    }
                    if (typeof this.images == 'object') {
                        this.images.forEach(image => {
                            image.url = `${prefix}${this.urlTransform}${image.path}`;
                        });
                    }else {
                        this.items[0].url = `${prefix}${this.items[0].url}`;
                    }
                }
            }
        },

        computed: {
          hasSubtitle() {
            return !!this.subTitle;
          }
        }

    }
</script>

<style scoped>
  span.sub-title{
    color: #8b8b8b;
    margin-left: 5px;
    font-style: italic;
  }
</style>
