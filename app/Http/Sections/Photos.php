<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\Buttons\Cancel;
use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\SaveAndCreate;
use SleepingOwl\Admin\Section;

/**
 * Class Photos
 *
 * @property \App\Models\Photo $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Photos extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Галерея';

    /**
     * @var string
     */
    protected $alias;

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(750)->setIcon('fa fa-bars');
    }

    /**
     * @param array $payload
     *
     * @return DisplayInterface
     */
    public function onDisplay($payload = [])
    {
        return AdminDisplay::table()->setColumns([

            AdminColumn::link('id', '#')->setWidth('50px')->setHtmlAttribute('class', 'text-center'),
            AdminColumn::text('roof.title', 'Покрытие кровли'),
            AdminColumn::text('formroof.title', 'Форма кровли'),

        ])->paginate(25);
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

                AdminFormElement::select('roof_id')->setLabel('Покрытие кровли')
                    ->setModelForOptions(\App\Models\Roof::class)
                    ->setHtmlAttribute('placeholder', 'Покрытие кровли')
                    ->setDisplay('title')
                    ->required(),
                AdminFormElement::select('formroof_id')->setLabel('Форма кровли')
                    ->setModelForOptions(\App\Models\Formroof::class)
                    ->setHtmlAttribute('placeholder', 'Форма кровли')
                    ->setDisplay('title')
                    ->required(),
                AdminFormElement::images('gallery', 'Галерея')->storeAsJson()->required(),

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
