<?php

namespace App\Filament\Resources;

use App\Filament\Exports\AbsensiExporter;
use App\Filament\Resources\AbsensiAcaraResource\Pages;
use App\Filament\Resources\AbsensiAcaraResource\RelationManagers;
use App\Models\Absensi;
use App\Models\AbsensiAcara;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AbsensiAcaraResource extends Resource
{
    protected static ?string $slug = 'absensi-acara';
    protected static ?string $navigationGroup = 'Acara';
    protected static ?int $navigationSort = 3;

    protected static ?string $pluralModelLabel = 'Absensi Acara';

    
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('jemaat_id')
                    ->label('Nama Jemaat')->relationship('Jemaat','nama_jemaat')->searchable(),
                 Select::make('acara_id')
                    ->label('Nama Acara')->relationship('Acara','nama_acara')->searchable()
            ]);
    }
    public static function getEloquentQuery() : Builder
    {
        return parent::getEloquentQuery()->where('done',0);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                
                TextColumn::make('Jemaat.nama_jemaat')
                    ->label('Nama Jemaat'),
                
                SelectColumn::make('status_kehadiran')
                    ->label('Hadir')->options(['Hadir' => 'Hadir','Tidak Hadir' => 'Tidak hadir','Izin' => 'Izin', 'Sakit' => 'Sakit']),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListAbsensiAcaras::route('/'),
            'create' => Pages\CreateAbsensiAcara::route('/create'),
            'edit' => Pages\EditAbsensiAcara::route('/{record}/edit'),
        ];
    }
}
