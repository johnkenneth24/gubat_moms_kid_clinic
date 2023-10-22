<?php

namespace App\Http\Livewire\MedicalRecord;

use Livewire\Component;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public $patient_app;
    public $path_export = 'docx/gubat_moms_kids_clinic.docx';

    public function export()
    {
      // dd($this->patient_app->walkInPatient);
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('name', $this->patient_app->user->fullname ??  $this->patient_app->walkInPatient->fullname);
        $templateProcessor->setValue('gender', $this->patient_app->user->gender ??  $this->patient_app->walkInPatient->gender);
        $templateProcessor->setValue('mother', $this->patient_app->user->mother_name ??  $this->patient_app->walkInPatient->mother_name);
        $templateProcessor->setValue('father', $this->patient_app->user->father_name ??    $this->patient_app->walkInPatient->father_name);
        $templateProcessor->setValue('address', $this->patient_app->user->address ??  $this->patient_app->walkInPatient->address);
        if($this->patient_app->walkInPatient)
        {
        $templateProcessor->setValue('bdate', $this->patient_app->walkInPatient->birthdate->format('F d, Y'));
        }
        else
        {
        $templateProcessor->setValue('bdate', $this->patient_app->user->birthdate->format('F d, Y'));
        }

        if($this->patient_app->walkInPatient)
        {
          $templateProcessor->setValue('date', $this->patient_app->date_consultation->format('F d, Y'));
        }
        else
        {
          $templateProcessor->setValue('date', $this->patient_app->date_appointment->format('F d, Y'));
        }

        $templateProcessor->setValue('weight',$this->patient_app->bookAppConsult->weight ??  $this->patient_app->walkInConsult->weight  );
        $templateProcessor->setValue('height',$this->patient_app->bookAppConsult->height ??  $this->patient_app->walkInConsult->height);
        $templateProcessor->setValue('bp', $this->patient_app->bookAppConsult->blood_pressure ??  $this->patient_app->walkInConsult->blood_pressure);
        $templateProcessor->setValue('med_intake',$this->patient_app->bookAppConsult->medication_intake ??  $this->patient_app->walkInConsult->medication_intake);
        $templateProcessor->setValue('history', $this->patient_app->bookAppConsult->diagnosis ??  $this->patient_app->walkInConsult->diagnosis);
        $templateProcessor->setValue('vaccine', $this->patient_app->bookAppConsult->vaccine_received ??  $this->patient_app->walkInConsult->vaccine_received);

        $templateProcessor->setValue('dateNow', now()->format('F d, Y'));

        if($this->patient_app->walkInPatient)
        {
          $filename = 'Medical Record_' . $this->patient_app->walkInPatient->lastname . '_' . $this->patient_app->date_consultation->format('Y-m-d');
        }
        else
        {
        $filename = 'Medical Record_' . $this->patient_app->user->lastname . '_' . $this->patient_app->date_appointment->format('Y-m-d') ;

        }
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }

    public function render()
    {
        return view('livewire.medical-record.export');
    }
}
