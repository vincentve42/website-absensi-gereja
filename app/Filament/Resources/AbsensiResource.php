<?php

namespace App\Filament\Resources;

use App\Filament\Exports\AbsensiExporter;
use App\Filament\Resources\AbsensiResource\Pages;
use App\Filament\Resources\AbsensiResource\RelationManagers;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $slug = 'absensi';

    protected static ?string $pluralModelLabel = 'Rekap Absensi';



    public static function getEloquentQuery() : Builder
    {
        return parent::getEloquentQuery()->where('done',1);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('Jemaat.nama_jemaat')->searchable(),
                TextColumn::make('Acara.nama_acara')->sortable()->searchable(),
                  SelectColumn::make('status_kehadiran')
                    ->label('Hadir')->options(['Hadir' => 'Hadir','Tidak Hadir' => 'Tidak hadir','Izin' => 'Izin', 'Sakit' => 'Sakit']),
                
            ])
            ->filters([
                SelectFilter::make('acara_id')->label('Acara')->relationship('Acara', 'nama_acara')->searchable(),
                SelectFilter::make('status_kehadiran')->label('Status Kehadiran')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                \Filament\Tables\Actions\ExportAction::make()->exporter(AbsensiExporter::class),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbsensis::route('/'),
            'create' => Pages\CreateAbsensi::route('/create'),
            'edit' => Pages\EditAbsensi::route('/{record}/edit'),
        ];
    }
}
