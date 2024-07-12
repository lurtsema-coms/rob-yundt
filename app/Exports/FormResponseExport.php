<?php

namespace App\Exports;

use App\Models\FormResponse;
use App\Models\Issue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FormResponseExport implements FromQuery, WithHeadings, WithMapping
{

    public function headings(): array
    {
        $headings = [
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Home Address',
        ];

        foreach (Issue::all() as $issue) {
            $headings[] = ($issue->description);
        }
        $headings[] = 'Other Issues';
        $headings[] = 'Message';
        $headings[] = 'Created At';
        return $headings;
    }

    public function map($row): array
    {
        $map = [
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->phone,
            $row->home_address,
        ];

        foreach (Issue::all() as $issue) {
            $map[] = ($row->formIssueResponse->where('issue_id', $issue->id)->first()) ? 1 : null;
        }

        $map[] = $row->other_issues;
        $map[] = $row->message;
        $map[] = $row->created_at;

        return $map;
    }

    public function query()
    {
        return FormResponse::with(['formIssueResponse' => function ($query) {
            $query->with('issue');
        }]);
    }
}
