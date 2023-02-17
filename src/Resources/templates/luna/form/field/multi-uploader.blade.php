{{-- Part of earth project. --}}
<?php
$meta = (bool) $field->get('edit_form', $field->get('image_form'));
/** @var \Windwalker\Form\Form $imageMetaForm */
/** @var \Windwalker\Form\Form $editForm */
$form = $editForm ?? $imageMetaForm;
?>

<div v-pre>
    <div id="{{ $attrs['id'] }}-wrap" class="multi-uploader">
        <vue-drag-uploader
            id="{{ $attrs['id'] }}"
            :value="value"
            :url="uploadUrl"
            :max-files="maxFiles"
            :thumb-size="thumbSize"
            :disabled="disabled"
            :readonly="readonly"
            :max-concurrent="maxConcurrent"
            accept="{{ $field->accept() }}"
            placeholder="{{ $attrs['placeholder'] }}"
            @change="value = $event"
            @attr('@item-click', $meta ? 'itemClick' : 'openFile')
            ref="app"
        >
            <template slot="extra" slot-scope="{ item, i }">
                @if ($meta)
                    <h5 v-if="isImage(item.url) && item.title !== ''" class="preview-img__title text-white p-4">
                        @{{ item.title }}
                    </h5>
                @endif
                @if (!$field->get('disabled'))
                    <div class="d-none">
                        @if ($meta)
                            <input type="hidden" :name="`{{ $attrs['name'] }}[${i}][url]`" :value="item.url" />
                            @foreach ($form->getFields() as $field)
                                <input type="hidden" :name="`{{ $attrs['name'] }}[${i}][{{ $field->getName() }}]`" :value="item.{{ $field->getName() }}" />
                            @endforeach
                        @else
                            <input type="hidden" :name="`{{ $attrs['name'] }}[${i}]`" :value="item.url" />
                        @endif
                    </div>
                @endif
            </template>
        </vue-drag-uploader>

        <div class="modal fade c-multi-uploader-modal" id="{{ $attrs['id'] }}-meta-modal" tabindex="-1" role="dialog"
            aria-labelledby="{{ $attrs['id'] }}-meta-modal-label" aria-hidden="true">
            <div class="modal-dialog" :class="[isImage(current.url) ? 'modal-lg' : '']"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="{{ $attrs['id'] }}-meta-modal-label">
                            @lang('luna.form.field.multi.uploader.edit.title')
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div v-if="isImage(current.url)" class="col-lg-7 text-center">
                                <div class="c-dragarea position-relative"
                                    :class="{ 'h-loading': loading }"
                                    ref="dragarea"
                                    @dragover.stop.prevent="dragover"
                                    @dradleave.stop.prevent="dragleave"
                                    @drop.stop.prevent="drop"
                                >
                                    <div v-if="loading"
                                        class="d-flex align-items-center justify-content-center"
                                        style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; background-color: rgba(255, 255, 255, .5)">
                                        <span class="spinner-border "></span>
                                    </div>
                                    <a :href="current.url" target="_blank">
                                        <img class="img-fluid rounded" :src="current.url" alt="Img preview">
                                    </a>
                                </div>
                            </div>
                            <div class="col">
                                @foreach ($form->getFields() as $field)
                                <div class="form-group">
                                    {!! $field->render() !!}
                                </div>
                                @endforeach
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">
                                        @lang('luna.form.field.multi.uploader.meta.button.ok')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="modal-footer">--}}
                        {{----}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

        @if ($field->get('required'))
            <input type="text" class="form-control" style="display: none" required
                @attr('data-value-missing-message', $field->attr('data-value-missing-message'))
                :disabled="value.length > 0" />
        @endif
    </div>
</div>
