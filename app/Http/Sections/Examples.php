<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Display\Tree\OrderTreeType;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Examples
 *
 * @property \App\Models\Example $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Examples extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title="Похожие навесы";

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(250)->setIcon('fa fa-bars');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        return AdminDisplay::tree(OrderTreeType::class)->setValue('title');
    }

    /**
     * @param int|null $id
     * @param array $payload
     *
     * @return FormInterface
     */
    public function onEdit($id = null, $payload = [])
    {
        $form = AdminForm::card()->addBody([

            AdminFormElement::columns()->addColumn([

                AdminFormElement::text('title', 'Заголовок')->required(),
                AdminFormElement::textarea('text', 'Описание в листинге')->required(),
                AdminFormElement::images('gallery', 'Галерея')->storeAsJson(),

                AdminFormElement::html('</hr><p class="text-center"><b>Характеристики</b></p>'),
                AdminFormElement::hasManyLocal('characteristics', [
                    AdminFormElement::text('text', 'Название'),
                    AdminFormElement::text('value', 'Значение')
                ]),

                AdminFormElement::html('</hr><p class="text-center"><b>Цены и сроки</b></p>'),
                AdminFormElement::hasManyLocal('prices', [
                    AdminFormElement::text('text', 'Название'),
                    AdminFormElement::text('value', 'Значение')
                ]),


            ])

        ]);

        $form->getButtons()->setButtons([
            'save'  => new Save(),
            'save_and_close'  => new SaveAndClose(),
            'save_and_create'  => new SaveAndCreate(),
            'cancel'  => (new Cancel()),
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate($payload = [])
    {
        return $this->onEdit(null, $payload);
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return true;
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
