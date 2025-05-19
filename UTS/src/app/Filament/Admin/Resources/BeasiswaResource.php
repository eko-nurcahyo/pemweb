<?php

namespace App\Filament\Admin\Resources;

use App\Models\Beasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Admin\Resources\BeasiswaResource\Pages;

class BeasiswaResource extends Resource
{
    protected static ?string $model = Beasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Beasiswas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->label('Nama Beasiswa')->required(),
            Forms\Components\Textarea::make('deskripsi')->label('Deskripsi'),
            Forms\Components\Select::make('jenis')->label('Jenis')->options([
                'akademik' => 'Akademik',
                'non-akademik' => 'Non-Akademik',
            ])->required(),
            Forms\Components\TextInput::make('kuota')->numeric()->label('Kuota')->required(),
            Forms\Components\DatePicker::make('tanggal_mulai')->label('Tanggal Mulai')->required(),
            Forms\Components\DatePicker::make('tanggal_selesai')->label('Tanggal Selesai')->required(),
            Forms\Components\DatePicker::make('deadline')->label('Deadline Pendaftaran')->required(),
            Forms\Components\TagsInput::make('dokumen_wajib')->label('Dokumen Wajib')->suggestions(['KTP', 'KHS', 'SKTM']),
            Forms\Components\Toggle::make('aktif')->label('Status Aktif')->default(true),
        ]);
    }

public static function table(Table $table): Table
{
    return $table->columns([
        TextColumn::make('nama')->label('Nama')->searchable(),
        TextColumn::make('jenis')->label('Jenis'),
        TextColumn::make('kuota')->label('Kuota'),
        TextColumn::make('tanggal_mulai')->date()->label('Mulai'),
        TextColumn::make('tanggal_selesai')->date()->label('Selesai'),
        TextColumn::make('deadline')->date()->label('Deadline'),
        BadgeColumn::make('aktif')
            ->label('Status')
            ->colors([
                'success' => fn ($state) => $state === true,
                'danger' => fn ($state) => $state === false,
            ])
            ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Tidak Aktif'),
    ])
    ->actions([
        Tables\Actions\EditAction::make(),
    ])
    ->bulkActions([
        Tables\Actions\DeleteBulkAction::make(),
    ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeasiswas::route('/'),
            'create' => Pages\CreateBeasiswa::route('/create'),
            'edit' => Pages\EditBeasiswa::route('/{record}/edit'),
        ];
    }
}
