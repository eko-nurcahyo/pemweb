<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pendaftaran Beasiswa';
    protected static ?string $pluralModelLabel = 'Pendaftaran';
    protected static ?string $modelLabel = 'Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('user_id')
                ->label('Mahasiswa')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Select::make('beasiswa_id')
                ->label('Beasiswa')
                ->relationship('beasiswa', 'nama')
                ->searchable()
                ->required(),

            Textarea::make('catatan')
                ->label('Catatan Tambahan')
                ->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Nama Mahasiswa'),
                TextColumn::make('user.nim')->label('NIM'),
                TextColumn::make('beasiswa.nama')->label('Beasiswa'),
                TextColumn::make('catatan')->label('Catatan')->limit(40)->wrap(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'pending' => 'secondary',
                        'diterima' => 'success',
                        'ditolak' => 'danger',
                        'revisi' => 'warning',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                        'revisi' => 'Perlu Revisi',
                        default => ucfirst($state),
                    }),

                TextColumn::make('created_at')
                    ->label('Didaftarkan')
                    ->dateTime('d M Y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Menunggu',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                        'revisi' => 'Perlu Revisi',
                    ]),
            ])
            ->actions([
                Action::make('Terima')
                    ->label('Terima')
                    ->action(fn (Pendaftaran $record) => $record->update(['status' => 'diterima']))
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'pending'),

                Action::make('Tolak')
                    ->label('Tolak')
                    ->form([
                        Textarea::make('catatan')
                            ->label('Catatan Penolakan')
                            ->required(),
                    ])
                    ->action(function (Pendaftaran $record, array $data) {
                        $record->update([
                            'status' => 'ditolak',
                            'catatan' => $data['catatan'],
                        ]);
                    })
                    ->color('danger')
                    ->visible(fn ($record) => $record->status === 'pending'),

                Action::make('Revisi')
                    ->label('Minta Revisi')
                    ->form([
                        Textarea::make('catatan')
                            ->label('Catatan Revisi')
                            ->required(),
                    ])
                    ->action(function (Pendaftaran $record, array $data) {
                        $record->update([
                            'status' => 'revisi',
                            'catatan' => $data['catatan'],
                        ]);
                    })
                    ->color('warning')
                    ->visible(fn ($record) => $record->status === 'pending'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('Hapus Terpilih'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}
