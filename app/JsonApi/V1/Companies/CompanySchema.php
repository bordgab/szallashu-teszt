<?php

namespace App\JsonApi\V1\Companies;

use App\Models\Company;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\Boolean;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class CompanySchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Company::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make('companyId'),
            Str::make('companyName', 'companyName'),
            Str::make('companyRegistrationNumber', 'companyRegistrationNumber'),
            DateTime::make('companyFoundationDate', 'companyFoundationDate')
                ->deserializeUsing(fn ($value) => str_replace('.', '-', $value))
                ->fillUsing(function ($model, $column, \DateTimeInterface $value, $validatedData) {
                    $model->fill([$column => $value->format('Y.m.d')]);
                }),

            Str::make('country'),
            Str::make('zipCode', 'zipCode'),
            Str::make('city'),
            Str::make('streetAddress', 'streetAddress'),
            Number::make('latitude')->acceptStrings(),
            Number::make('longitude')->acceptStrings(),
            Str::make('companyOwner', 'companyOwner'),
            Number::make('employees'),
            Str::make('activity'),
            Boolean::make('active')
                ->extractUsing(fn ($model, $column, $value) => boolval($value)),
            Str::make('email'),
            Str::make('password'),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this)->delimiter(','),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
